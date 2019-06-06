<?php

define('ROOT_DIR', getcwd());
define('LIB_DIR', ROOT_DIR . '/lib/');
define('CLASS_DIR', ROOT_DIR . '/class/');

require(LIB_DIR . 'nusoap.php');
require(CLASS_DIR . 'Service.php');
require(CLASS_DIR . 'ApiRoute.php');

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);


$api = new ApiRoute();
$api->execute();