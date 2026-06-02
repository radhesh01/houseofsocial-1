<?php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;
    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}

$system_path    = 'system';
$application_folder = 'application';
$view_folder    = '';

if (defined('STDIN')) { chdir(dirname(__FILE__)); }

if (($_temp = realpath($system_path)) !== FALSE) { $system_path = $_temp.'/'; }
else { $system_path = rtrim($system_path, '/').'/'; }

if ( ! is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3);
}

define('SELF',        pathinfo(__FILE__, PATHINFO_BASENAME));
define('FCPATH',      dirname(__FILE__).'/');
define('SYSPATH',     $system_path);
define('APPPATH',     $application_folder.'/');
define('VIEWPATH',    $view_folder !== '' ? $view_folder.'/' : APPPATH.'views/');

require_once SYSPATH.'core/CodeIgniter.php';
