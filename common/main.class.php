<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');


$main = new Class_Main($smarty);

class Class_Main {
	
	private $smarty;
	
	public function __construct($smarty) {
		$this->smarty = $smarty;
		$this->system_time = microtime(TRUE);
	}

	public function re_url( $url ) {
		header("Location: {$url}");
	}


	
	 public function is_login(){
		if ( isset($_SESSION['user_id']) )
		{
			return true;
		}
		else
		{
			return false;
		}
	 }
	 

}


