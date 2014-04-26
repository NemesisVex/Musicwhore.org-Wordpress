<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MtMapper
 *
 * @author Greg Bueno
 */

require_once('env.php');

class MtMapper {
	private $mt_db_host;
	private $mt_db_user;
	private $mt_db_password;
	private $mt_db_database;
	private $connection;

	//put your code here
	public function __construct() {
		$this->mt_db_host = VIGILANTMEDIA_MT_DB_HOST;
		$this->mt_db_user = VIGILANTMEDIA_MT_DB_USER;
		$this->mt_db_password = VIGILANTMEDIA_MT_DB_PASSWORD;
		$this->mt_db_database = VIGILANTMEDIA_MT_DB_NAME;

		$this->connect_to_mt_db();
	}

	public function get_entry_by_id($id) {
		$query = 'select * from mt_entry where entry_id = ' . $id;
		if (false !== ($result = mysql_query($query, $this->connection))) {
			$rs = mysql_fetch_object($result);
			return $rs;
		}
		return false;
	}

	public function get_category_by_id($id) {
		$query = 'select * from mt_category where category_id = ' . $id;
		if (false !== ($result = mysql_query($query, $this->connection))) {
			$rs = mysql_fetch_object($result);
			return $rs;
		}
		return false;
	}

	private function connect_to_mt_db() {
		$this->connection = mysqli_connect($this->mt_db_host, $this->mt_db_user, $this->mt_db_password, $this->mt_db_database);
	}
}

?>
