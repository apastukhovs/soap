<?php
class Database
{
	private $dbh;
	private $stmt;
	private $error;
	public function __construct($host, $db, $user, $pass)
	{ 	
		$dsn = 'mysql:host='.$host.';dbname='.$db;
		$opt = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];
		
		try {
			$this->dbh = new PDO($dsn, $user, $pass, $opt);
		} catch (PDOException $e) {  
			$this->error = $e->getMessage();  
		}  
	}
	
	public function query($query){  
		$this->stmt = $this->dbh->prepare($query);  
	} 
	public function bind($param, $value, $type = null){  
		if (is_null($type)) {  
			switch (true) {  
				case is_int($value):  
					$type = PDO::PARAM_INT;  
					break;  
				case is_bool($value):  
					$type = PDO::PARAM_BOOL;  
					break;  
				case is_null($value):  
					$type = PDO::PARAM_NULL;  
					break;  
				default:  
					$type = PDO::PARAM_STR;  
			}  
		}  
		$this->stmt->bindValue($param, $value, $type);  
	}
	public function execute(){  
		return $this->stmt->execute();  
	}
	public function resultset(){  
		$this->execute();  
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  
	}
	public function single(){  
		$this->execute();  
		return $this->stmt->fetch(PDO::FETCH_ASSOC);  
	}   
	public function rowCount(){  
		return $this->stmt->rowCount();  
	}
	public function lastInsertId(){  
		return $this->dbh->lastInsertId();  
	}
	
}