<?php

require_once '_inc/config.php';


/*SANITIZATION*/

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);


echo '<pre>';
print_r($date);
echo '</pre>';

/*VALIDATION*/

if(! trim($email))
{

    redirect('back');

}

if(! trim($date))
{

    redirect('back');

}
/*ALL HOLIDAYS*/

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
    $actualdate["year"].'-12-26',

];

$datetime = new DateTime($date);
$datetime = $datetime->modify('+1 day');
$datetime = $datetime->format('Y-m-d');


  

    foreach($holidays as $holiday)
    {   
        if($datetime == $holiday)
        {   
            $datetime = new DateTime($date);
            $datetime = $datetime->modify('+2 day');
            $datetime = $datetime->format('Y-m-d');
        }
    }


    $datetime = explode(' ', $datetime);

    if($datetime[1] == 'Saturday')
    {   
        $datetime = str_replace($datetime[1], ' ', $datetime);
        $datetime = implode(' ', $datetime);

        $datetime = new DateTime($date);
        $datetime = $datetime->modify('+3 day');
        $datetime = $datetime->format('Y-m-d');
    }

    if($datetime[1] == 'Sunday')
    {   
        $datetime = str_replace($datetime[1], '', $datetime);
        $datetime = implode(' ', $datetime);

        $datetime = new DateTime($date);
        $datetime = $datetime->modify('+2 day');
        $datetime = $datetime->format('Y-m-d');
    }






echo '<pre>';
print_r($datetime);
echo '</pre>';



?>