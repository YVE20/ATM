<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$scriptpath = dirname(__DIR__);

// LOAD FUNCTIONS
require($scriptpath . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.php');

// AUTOLOAD CLASSES
spl_autoload_register('vendorClassAutoload');
spl_autoload_register('appClassAutoload');

# INITIALIZE MEDOO
require '../includes/database.php';

# DATE & TIME
date_default_timezone_set(getConfigValue("timezone"));



?>
