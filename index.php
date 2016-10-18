<?php define('RIGHT',TRUE);
include_once './base_config.php';

session_start();
session_write_close();

if(!$main->is_login()){
	$main->re_url('./controller/login.php');

}
else{
	$main->re_url('./controller/profile.php');

}

