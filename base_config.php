<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');


header( 'Content-Type:   text/html;   charset=utf-8 ');

define('SYSTEM_ROOT', $_SERVER['DOCUMENT_ROOT'].'/sign-up-model');

define('CONTROLLER', SYSTEM_ROOT . '/controller');

define('MODEL', SYSTEM_ROOT . '/model');


require  SYSTEM_ROOT.'/configs/configs.php';

require  SYSTEM_ROOT.'/smarty/MySmarty.class.php';


require SYSTEM_ROOT.'/model/mydbclass.php';

require SYSTEM_ROOT.'/common/main.class.php';




