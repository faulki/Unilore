<?php

class impliquer {
	

	private $pdo;

	
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	


	public function inscriptionUtilisateur($idavantageadhesion,$idadhesion) {
                $sql1 = "INSERT INTO impliquer (id_avantage_adhesion,id_adhesion) VALUES (:idavantageadhesion,:idadhesion)";
                                    
				$req = $this->pdo->prepare($sql1);

               
				$req->bindParam(":idavantageadhesion", $idavantageadhesion,\PDO::PARAM_STR);
                $req->bindParam(":idadhesion", $idadhesion,\PDO::PARAM_STR);
                $res = $req->execute();
	}

	
}