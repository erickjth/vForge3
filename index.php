<?php

/*
 * ---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * ---------------------------------------------------------------
 *     dev
 *     test
 *     prod
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */

define('ENVIRONMENT', 'dev');


if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'dev':
            error_reporting(E_ALL);
            break;

        case 'test':
        case 'prod':
            error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}

/* * *****MODULES PATH**** */
$modules_path = "modules";

/* * * define the site path ** */
$site_path = realpath(dirname(__FILE__));

define('ROOT', $site_path);
define('DS', DIRECTORY_SEPARATOR);


if (!is_dir(ROOT .DS. $modules_path)) {
    exit("ERROR: Check modules path in your sandbox.");
}
define('MOD_PATH',ROOT .DS. $modules_path);

require_once ROOT.DS.'core'.DS.'bootstrap.php';

?>
