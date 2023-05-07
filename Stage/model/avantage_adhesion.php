<?php

class avantage_adhesion
{
    private $pdo;

    public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

    public function getAllAvantageAdhesion() {
        $sql = 'SELECT * FROM avantage_adhesion';

        $req = $this->pdo($sql);
        $req->execute();
        
        return $req->fetchAll();
    }

    public function getInfosAvantageAdhesion($id) {
        $sql = 'SELECT * FROM avantage_adhesion WHERE id_avantage = :id';

        $req = $this->pdo($sql);
        $req->bindParam(':id', $id, PDO::PARAMINT);
        $req->execute();

        return $res->fetchAll();
    }
}

?>