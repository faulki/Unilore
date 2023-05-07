<?php

class proposition 
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

    public function getAllProposition() {
        $sql = "SELECT * FROM proposition";

        $req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll();
    }

	public function insertProposition($titre,$contenue){
		$sql1 = "INSERT INTO proposition (date_proposition,titre_proposition,contenue_proposition,etat_proposition,id_user) VALUES (:ladate,:letitre,:lecontenue,:letat,:liduser)";
                                    
				$req = $this->pdo->prepare($sql1);

				$etat = 'En attente';

                $req->bindParam(":ladate", date("Y-m-d H:i:s"),\PDO::PARAM_STR);
                $req->bindParam(":letitre", $titre,\PDO::PARAM_STR);
				$req->bindParam(":lecontenue", $contenue,\PDO::PARAM_STR);
                $req->bindParam(":letat", $etat,\PDO::PARAM_STR);
				$req->bindParam(":liduser", $_SESSION["connexion"] ,\PDO::PARAM_STR);
                $res = $req->execute();
	}
}

?>