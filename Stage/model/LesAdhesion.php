<?php

class lesadhesion {
	

	private $pdo;

	
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getInfoslesAdhesion($button_id) {
		
		$sql = "SELECT * FROM LesAdhesion WHERE id_lesadhesion = :id";
		$req = $this->pdo->prepare($sql);

		$req->bindParam(':id', $button_id, PDO::PARAM_STR);
		$req->execute();
		
		return $req->fetchAll();

	}
	
}