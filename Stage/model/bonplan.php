<?php

class bonplan
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

    public function getAllBonPlan() {
        $sql = "SELECT * FROM BonPlan";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll();
    }

    public function getInfosBonPlan($id_bonplan) {
        $sql = "SELECT * FROM BonPlan WHERE id_bonplan = :id";

        $req = $this->pdo->prepare($sql);

        $req->bindParam(':id', $id_bonplan, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    public function insertClick($id_bonplan) {
        $sql = "UPDATE BonPlan SET nbClick_bonplan = nbClick_bonplan + 1 WHERE id_bonplan = :id";

        $req = $this->pdo->prepare($sql);

        $req->bindParam(':id', $id_bonplan, PDO::PARAM_INT);

        $req->execute();
    }

    public function bonPlanPopulaire(){
        $sql = "SELECT id_bonplan FROM BonPlan WHERE nbClick_bonplan = (SELECT MAX(nbClick_bonplan) FROM BonPlan)";

        $req = $this->pdo->prepare($sql);
		$req->execute();

        return $req->fetch();
    }
}

?>