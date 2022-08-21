<?php

include_once __DIR__ . '/config.php';

class MySQLConn {
	private $conn;

	public function __construct($remote = false) {
		$this->connect($remote);
		$this->select_db(MYSQL_DB);
	}

	public function select_db($db_name) {
		$this->conn->select_db($db_name);
	}

	public function connect($remote = false) {
		if ($remote) {
			$this->conn = new mysqli(MYSQL_HOST_REMOTE, MYSQL_USER_REMOTE, MYSQL_PASSWORD_REMOTE);
		} else {
			$this->conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
		}

		if ($this->conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	}

	public function __destruct() {
		$this->close();
	}

	public function close() {
		$this->conn->close();
	}

	public function query($sql) {
		$ret = [
			'ok' => true,
		];

		if ($result = $this->conn->query($sql)) {
			if (is_object($result) && $result->num_rows > 0) {
				$ret['rows'] = [];

				while ($row = $result->fetch_assoc()) {
					$ret['rows'][] = $row;
				}
			}
		} else {
			$ret['ok'] = false;
			$ret['error'] = $this->conn->error;
		}

		return $ret;
	}
}

function run_query($query) {
	$mysql = new MySQLConn();
	return $mysql->query($query);
}