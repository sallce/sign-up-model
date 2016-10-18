<?php define('RIGHT',true);


require_once '../base_config.php' ;


session_start();
unset($_SESSION['user_id']);

$signup = 1;

$error1='';

if($db->post('sub')==1){
	
	$data = array();
	$data['email'] = $db->post('email');
	$data['first_name'] = $db->post('firstname');
	$data['last_name'] = $db->post('lastname');
	$data['password'] = md5($db->post('password'));

	if(!$db->is_registered($data['email'])){

		$userid = $db->insert('users',$data);

		if($userid){
			$_SESSION['user_id']=$userid;
			session_write_close();
			$main->re_url('profile.php');
		}
	}else{
		$error1 = 'Email is used, you can just sign in';
	}
	
	
}


$smarty->assign('signup',$signup);
$smarty->assign('error1',$error1);
$smarty->display('sign.php');
