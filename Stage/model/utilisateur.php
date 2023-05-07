<?php

class utilisateur {
	

	private $pdo;

	
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	
	public function connexion($mail, $mdp) {
		$sql = "SELECT id_user,mdp_user FROM Utilisateur WHERE mail_user = :mail";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':mail', $mail, PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {

			if(password_verify($mdp, $ligne["mdp_user"])) {
				
				$_SESSION["connexion"] = $ligne["id_user"];
				return true;
			}
			else {	
				return false;
			}
		}
		else {
			return false;
		}
	}


	public function estDejaInscrit($mail) {
		$sql = "SELECT COUNT(*) AS nombre FROM Utilisateur WHERE mail_user = :mail";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':mail', $mail, PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne["nombre"] == 0) {
			return false;
		}
		else {
			return true;
		}
	}


	public function getInfosUtilisateur() {
		
		$sql = "SELECT * FROM Utilisateur WHERE id_user = :id";
		$req = $this->pdo->prepare($sql);

		
		$req->bindParam(':id', $_SESSION["connexion"], PDO::PARAM_STR);
		$req->execute();
		
		return $req->fetch();

	}


	public function inscriptionUtilisateur($nom, $prenom, $email, $motDePasse) {
                $sql1 = "INSERT INTO Utilisateur (nom_user,prenom_user,mail_user,mdp_user) VALUES (:lenom,:leprenom,:lemail,:lemotdepasse)";
                                    
				$req = $this->pdo->prepare($sql1);

                $req->bindParam(":lenom", $nom,\PDO::PARAM_STR);
                $req->bindParam(":leprenom", $prenom,\PDO::PARAM_STR);
				$req->bindParam(":lemail", $email,\PDO::PARAM_STR);
                $req->bindParam(":lemotdepasse", $motDePasse,\PDO::PARAM_STR);
                $res = $req->execute();
	}

	public function modificationAdhesionUtilisateur($id){

		$sql = "UPDATE Utilisateur set id_adhesion = :id";
		$req = $this->pdo->prepare($sql);

	 	$req->bindParam(":id", $id,\PDO::PARAM_STR);
        $res = $req->execute();

	}

	public function modificationMailUtilisateur($Noveaumail,$mdp){

		$sql = "SELECT mdp_user FROM Utilisateur WHERE id_user = :id";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':id', $_SESSION["connexion"], PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {

			if(password_verify($mdp, $ligne["mdp_user"])) {
				
				$sql = "UPDATE Utilisateur set mail_user = :mail where id_user = :iduser";
				$req = $this->pdo->prepare($sql);

				$req->bindParam(":mail", $Noveaumail,\PDO::PARAM_STR);
				$req->bindParam(":iduser", $_SESSION["connexion"],\PDO::PARAM_STR);
				$res = $req->execute();
				return true;
			}
			else {	
				return false;
			}
		}
		else {
			return false;
		}

		

	}

	public function modificationMdpUtilisateur($mdp,$Noveaumdp){

		$sql = "SELECT mdp_user FROM Utilisateur WHERE id_user = :id";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':id', $_SESSION["connexion"], PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {

			if(password_verify($mdp, $ligne["mdp_user"])) {
				
				$sql = "UPDATE Utilisateur set mdp_user = :mdp where id_user = :iduser";
				$req = $this->pdo->prepare($sql);

				$req->bindParam(":mdp", $Noveaumdp,\PDO::PARAM_STR);
				$req->bindParam(":iduser", $_SESSION["connexion"],\PDO::PARAM_STR);
				$res = $req->execute();
				return true;
			}
			else {	
				return false;
			}
		}
		else {
			return false;
		}

		

	}
}