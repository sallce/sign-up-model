<?php define('RIGHT',true);


require_once '../base_config.php' ;


session_start();
session_write_close();

if(isset($_SESSION['image'])){
	$icon = $_SESSION['image'];
}else{
	$icon = '';
}


if($main->is_login()){

$sql = "select * from users where id ='".$_SESSION['user_id']."'";
$profile = $db->get_one($sql);
$profile['time'] = date("l jS \of F Y ") ;
$profile['icon'] = $icon;


$smarty->assign('profile',$profile);
$smarty->display('profile_view.php');
}else{
	$main->re_url('./login.php');
}





