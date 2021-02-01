<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Start a Session
if( !session_id() ) @session_start();

// Initialize Composer Autoload
require_once 'vendor/autoload.php';



/**
	 * Redirect
	 *
	 * @param $page
	 * @param int $status_code
	 */
	function redirect( $page, $status_code = 302 )
	{
		if ( $page == 'back' )
		{
			$location = $_SERVER['HTTP_REFERER'];
		}
		else
		{
			$page = ltrim($page, '/');
			$location = BASE_URL . "/$page";
		}

		header("Location: $location", true, $status_code);
		die();
	}


?>