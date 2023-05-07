<?php

class avis 
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

    public function getAllAvis() {
        $sql = 'SELECT * FROM avis';

        $req = $this->pdo($sql);

        return $req->fetchAll();
    }

    public function insertAvis($titre, $note, $description, $date, $id_user, $id_bonplan) {
        $sql ='INSERT INTO avis (titre_avis, note_avis, description_avis, date_avis, id_user, id_bonplan) VALUES (:titre, :note, :description, :date, :id_user, :id_bonplan)';

        $req = $this->pdo($sql);

        $req->bindParam(':titre', $titre, PDO::PARAMSTR);
        $req->bindParam(':note', $note, PDO::PARAMINT);
        $req->bindParam(':description', $description, PDO::PARAMSTR);
        $req->bindParam(':date', $date, PDO::PARAMSTR);
        $req->bindParam(':id_user', $id_user, PDO::PARAMINT);
        $req->bindParam(':id_bonplan', $id_bonplan, PDO::PARAMINT);

        $req->execute();
    }
}

?>