<?php
class Database
	{
	// credenziali
	private $host = "172.17.0.1";
	private $db_name = "mydb";
	private $username = "root";
	private $password = "";
	public $conn;
	// connessione al database
	public function getConnection()
		{
		$this->conn = null;
		try
			{
			$this->conn = mysqli_connect("mysql:host=" . $this->host . "; dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->exec("set names utf8");
			}
		catch(PDOException $exception)
			{
			echo "Errore di connessione: " . $exception->getMessage();
			}
		return $this->conn;
		}
	}
?>