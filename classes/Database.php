<?php

class Database {

	public $db;




	public function __construct() {

		$this->connect();

	}

	public function connect() {

		$this->db = new mysqli("localhost","root","","book_store");

		if(!$this->db){
			return $this->db->connect_error;
		}

	}




}