<?php
include ('Database.php');
class SoapAutoStore
{
	private $con;
	
	public function __construct()
	{
		$this->con = (is_null($this->con)) ? self::connect() : $this->con;
	}
	
	static function connect()
	{
		try {
		   $con = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
		} catch (PDOException $e) {
		   echo $e->getMessage();
		}
		
		return $con;
	}
	
	public function insertAuto($sql)
	{
		$this->con->query($sql);
		$this->con->execute();
	}
	
	public function getListAuto()
	{
		$sql = "SELECT id, brand, model FROM cars";
		$this->con->query($sql);
		$res = $this->con->resultset();
		
		return $res;
	}
	
	public function getListBrand()
	{
		$sql = "SELECT DISTINCT brand FROM cars";
		$this->con->query($sql);
		$res = $this->con->resultset();
		
		return $res;
	}
	
	public function getListModel()
	{
		$sql = "SELECT DISTINCT model FROM cars";
		$this->con->query($sql);
		$res = $this->con->resultset();
		
		return $res;
	}
	
	public function getListYear()
	{
		$sql = "SELECT DISTINCT Year FROM cars";
		$this->con->query($sql);
		$res = $this->con->resultset();
		
		return $res;
	}
	
	public function getListEngine()
	{
		$sql = "SELECT DISTINCT engine FROM cars";
		$this->con->query($sql);
		$res = $this->con->resultset();
		
		return $res;
	}