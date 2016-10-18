<?php defined('RIGHT') OR exit('No direct script access allowed!');

require 'Smarty.class.php';


class MySmarty extends Smarty {

	function MySmarty() {

		
		parent::__construct();

		
		$this->template_dir =  SYSTEM_ROOT . '/templates/';
		$this->compile_dir =  SYSTEM_ROOT . '/templates_c/';
		$this->config_dir =  SYSTEM_ROOT . '/configs/';
		$this->cache_dir =  SYSTEM_ROOT . '/cache/';

		$this->debugging = false;
		$this->caching = false;
		$this->cache_lifetime = 120;
		$this->assign('app_name','MySmarty');

	}

}

$smarty = new MySmarty;

?>