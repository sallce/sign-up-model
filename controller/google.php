<?php
define('RIGHT',true);


require_once '../base_config.php' ;

session_start();

$email = $db->post('email');
$_SESSION['image'] = $db->post('google_icon');

$data = array();
$data['email'] = $email;
$data['first_name'] = $db->post('first_name');
$data['last_name'] = $db->post('last_name');


if($db->is_registered($email)){
	$sql = "select * from users where email ='".$email."'";
	$profile = $db->get_one($sql);
	$_SESSION['user_id'] = $profile['id'];
}else if($email != null){
	$userid = $db->insert('users',$data);
	$_SESSION['user_id']=$userid;
}
session_write_close();
//var_dump($data);
$main->re_url('profile.php');