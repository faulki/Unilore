<?php

class adhesion {
	

	private $pdo;

	
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	
	public function ajoutadhesion($nom, $date, $prix) {
                $sql1 = "INSERT INTO adhesion (nom_adhesion,date_adhesion,prix_adhesion) VALUES (:lenom,:ladate,:leprix)";
                                    
				$req = $this->pdo->prepare($sql1);

                $req->bindParam(":lenom", $nom,\PDO::PARAM_STR);
                $req->bindParam(":ladate", $date,\PDO::PARAM_STR);
				$req->bindParam(":leprix", $prix,\PDO::PARAM_STR);
                $res = $req->execute();
	}

	public function statistique(){
		/*$sql = "SELECT CAST(COUNT(CASE WHEN nom_adhesion = 'basique' THEN 1 END)*100/COUNT(*) as UNSIGNED) AS 'pbasique',CAST(COUNT(CASE WHEN nom_adhesion = 'extra' THEN 1 END)*100/COUNT(*) as UNSIGNED) AS 'pextra',CAST(COUNT(CASE WHEN nom_adhesion= :ad3 THEN 1 END)*100/COUNT(*) as UNSIGNED) AS 'fondateur' FROM adhesion;";

		$req = $this->pdo->prepare($sql);
		$req->execute();
        
        $res = $req->execute();

        return $req->fetchAll();*/

        $sql = "SELECT CAST(COUNT(CASE WHEN nom_adhesion = 'basique' THEN 1 END)*100/COUNT(*) as UNSIGNED) AS 'pbasique' FROM adhesion;";

		$req = $this->pdo->prepare($sql);
		$req->execute();
      

        return $req->fetch();

	} 

	public function statistiqueextra(){

        $sql = "SELECT CAST(COUNT(CASE WHEN nom_adhesion = 'extra' THEN 1 END)*100/COUNT(*) as UNSIGNED) AS 'pextra' FROM adhesion;";

		$req = $this->pdo->prepare($sql);
		$req->execute(); 

        return $req->fetch();

	} 

	public function nombreadhesion(){
		$sql = "SELECT COUNT(*) as nb FROM adhesion;";

		$req = $this->pdo->prepare($sql);
		$req->execute();

		return $req->fetch();

		
	}

	
}