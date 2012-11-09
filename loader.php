<?php 

define( 'APPLICATION_PATH', realpath( dirname( __FILE__ ) .'/../' ) );
defined('NETWORK')
|| define('NETWORK', (getenv('NETWORK') ? strtolower(getenv('NETWORK')) : 'moreniche'));

require_once (realpath( dirname( __FILE__ ) ) . '/../../library/Files/Factory.php');
ini_set('display_errors', 0);

$paths = array (
    APPLICATION_PATH .'/../' . NETWORK . '/skin/common/',
    APPLICATION_PATH .'/../' . NETWORK . '/skin/affiliates/'		
);

	try {
		$oFile = Files_Factory::getFile($paths, $_GET['request']);
		$oFile->displayFile();
	} catch (Exception $e) {
		header('HTTP/1.0 404 Not Found');
	}

?>