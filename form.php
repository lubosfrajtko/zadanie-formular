<?php

require_once '_inc/config.php';


/*sanitizacion*/

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);


/*
* If user did not enter email or date, return him back with flash message.
*/


if(! trim($email))
{
    flash()->error('Musíš zadať email.');
    redirect('back');

}

if(! trim($date))
{
    flash()->error('Musíš zadať dátum.');
    redirect('back');

}

/*
* List of all holidays
*/

/*
* return array of actual date
*/
$actualdate = getdate();

$holidays = [

    $actualdate["year"].'-01-01',
    $actualdate["year"].'-04-02',
    $actualdate["year"].'-04-05',
    $actualdate["year"].'-05-08',
    $actualdate["year"].'-07-05',
    $actualdate["year"].'-08-29',
    $actualdate["year"].'-09-01',
    $actualdate["year"].'-09-15',
    $actualdate["year"].'-11-01',
    $actualdate["year"].'-11-17',
    $actualdate["year"].'-12-24',
    $actualdate["year"].'-12-25',
    $actualdate["year"].'-12-26'
];


/*
* Into variable $resultingtime will save next day from date which sent user and also format date with weekday
*/

$resultingtime = new DateTime($date);
$resultingtime = $resultingtime->modify('+1 day');
$resultingtime = $resultingtime->format('Y-m-d l');

/*
* remove weekday from $resultingtime
*/

$datewithoutday = explode(' ', $resultingtime);
$datewithoutday = $datewithoutday[0];

/*
* if day which sent user is holiday, i will skip it.
*/
    foreach($holidays as $holiday)
    {   
        if($datewithoutday == $holiday)
        {   
            $resultingtime = new DateTime($date);
            $resultingtime = $resultingtime->modify('+2 day');
            $resultingtime = $resultingtime->format('Y-m-d');
        }
    }

    if($datewithoutday == $holidays[10])
    {   
        $resultingtime = new DateTime($date);
        $resultingtime = $resultingtime->modify('+4 day');
        $resultingtime = $resultingtime->format('Y-m-d');
    }

    if($datewithoutday== $holidays[11])
    {   
        $resultingtime = new DateTime($date);
        $resultingtime = $resultingtime->modify('+3 day');
        $resultingtime = $resultingtime->format('Y-m-d');
    }

    if($datewithoutday == $holidays[12])
    {   
        $resultingtime = new DateTime($date);
        $resultingtime = $resultingtime->modify('+2 day');
        $resultingtime = $resultingtime->format('Y-m-d');
    }

/*
* If in date which send user is Saturday or Sunday i will skip it.
*/

    if(strpos($resultingtime, 'Saturday'))
    {
        $resultingtime = new DateTime($date);
        $resultingtime = $resultingtime->modify('+3 day');
        $resultingtime = $resultingtime->format('Y-m-d');
    }

    if(strpos($resultingtime, 'Sunday'))
    {   
        $resultingtime = new DateTime($date);
        $resultingtime = $resultingtime->modify('+2 day');
        $resultingtime = $resultingtime->format('Y-m-d');
    }

/*
* Format date
*/

    $resultingtime = strtotime($resultingtime);
    $resultingtime = date('j M Y', $resultingtime);

/*
* Retun flash message which closest day is avaible and redirect back 
*/

    flash()->success('Najbližši voľný termín od zadania dátumu je ' . $resultingtime);
    redirect('back');



?>