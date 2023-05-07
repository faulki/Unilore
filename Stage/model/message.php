<?php

class message 
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


	public function insertmessage($nom,$mail,$lemessage){
		$sql1 = "INSERT INTO Message (nom_message,mail_message,un_message) VALUES (:lenom,:lemail,:lemessage)";
                                    
				$req = $this->pdo->prepare($sql1);

                $req->bindParam(":lenom", $nom ,\PDO::PARAM_STR);
                $req->bindParam(":lemail", $mail,\PDO::PARAM_STR);
				$req->bindParam(":lemessage", $lemessage,\PDO::PARAM_STR);
                $res = $req->execute();
	}
}

?>