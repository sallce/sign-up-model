<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');

$db = new DB();

Class DB {

	private $conn;

	public function __construct() {
		require_once SYSTEM_ROOT . '/configs/config.db.php';
		$this->conn = @mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);

		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		if(!@mysql_select_db($db_config["database"],$this->conn)) {
			die('Cannot select database');
		}
	}
	
	function is_registered($email){
		$sql = "select * from users where email='".$email."'";
		$result = $this->query($sql);
		if(mysql_num_rows($result)>0){
			return true;
		}else
			return false;
	}

	public function post($element){
		
		if(isset($_POST["$element"])){
			$res=$_POST["$element"];
			$res=trim($res);
			$res=mysql_real_escape_string($res);
			return $res;
		}
		
	}

	public function get($element){
		if(isset($_GET["$element"])){
			$res=$_GET["$element"];
			$res=trim($res);
			$res=mysql_real_escape_string($res);
			return $res;
		}
	}

	public function query($sql) {
		$query = mysql_query($sql,$this->conn);
		if(!$query) die('Query Error: ' . $sql);
		return $query;
	}

	public function get_one($sql,$result_type = MYSQL_ASSOC) {
		$query = $this->query($sql);
		$rt = mysql_fetch_array($query,$result_type);
		return $rt;
	}

	public function insert($table,$dataArray) {
		$field = "";
		$value = "";
		if( !is_array($dataArray) || count($dataArray)<=0) {
			die('no data to insert');
			return false;
		}
		while(list($key,$val)=each($dataArray)) {
			$field .="$key,";
			$value .="'$val',";
		}
		$field = substr( $field,0,-1);
		$value = substr( $value,0,-1);
		$sql = "insert into $table($field) values($value)";
		if(!mysql_query($sql,$this->conn)) return false;
		$last_id = mysql_insert_id($this->conn);
		return $last_id;
	}

}