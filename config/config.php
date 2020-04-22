<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define directories
define('SMARTY_DIR', 	'../includes/Smarty/libs/');
define('TEMPLATE_DIR', 	'../public_html/templates/');
define('SCRIPT_DIR', 	'../public_html/scripts/');
define('STYLE_DIR', 	'../public_html/styles/');

// Include smarty
require_once(SMARTY_DIR . 'Smarty.class.php');

// Init smarty
$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir  = '../_cache';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../_cache';

// Define database configs
define('DATABASE_NAME', 	'todo_list');
define('SERVERNAME', 		'localhost');
define('USERNAME', 			'root');
define('PASSWORD', 			'');
define('DATABASE_PREFIX', 	'todo_');


 ?>