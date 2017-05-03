<?php

include_once "Database.php";

class DatabaseQueries extends Database {

	private $queries;

	public function __construct() {

		parent::__construct();
	}

	public function fetch_data($sql){

		$this->queries = $this->db->query($sql);

		

		if($this->queries->num_rows > 0)
		{
			return $this->queries->fetch_all(MYSQLI_ASSOC);
		}
		else
		{
			return null;
		}
	} 

	public function insert_data($sql) {

		$this->queries = $this->db->query($sql);

		if($this->queries) {

			return $this->db->insert_id ;
		}else{
			return $this->queries->error;
		}

	}



}