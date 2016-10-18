<?php
define('RIGHT',true);


require_once '../base_config.php' ;
require_once MODEL.'/mydbclass.php';

session_start();
unset($_SESSION['user_id']);

$error='';

if($db->post('sub')==1){
	
	$data = array();

	$data['email'] = $db->post('username');

	$data['password'] = md5($db->post('password'));

	$sql = "select * from users where email ='".$data['email']."'";
	$user_info = $db->get_one($sql);
	if($user_info['password'] == $data['password']){
		$_SESSION['user_id']=$user_info['id'];
		session_write_close();
		$main->re_url('profile.php');

	}else{
		$error = 'Username or password is not correct';
	}
	
	
}

$signup=0;
$smarty->assign('error',$error);
$smarty->assign('signup',$signup);
$smarty->display('sign.php');
