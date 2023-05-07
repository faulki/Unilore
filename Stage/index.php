<?php
require_once './vendor/autoload.php';
session_start();

// Test de connexion à la base
$config = parse_ini_file("config.ini");
try {
	$pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
} catch(Exception $e) {
	echo "<h1>Erreur de connexion à la base de données :</h1>";
	echo $e->getMessage();
	exit;
}

// Chargement des fichiers MVC
require("controller/controller.php");
require("view/vue.php");
require("model/utilisateur.php");
require("model/proposition.php");
require("model/impliquer.php");
require("model/bonplan.php");
require("model/avis.php");
require("model/avantage_adhesion.php");
require("model/adhesion.php");
require("model/message.php");
require("model/LesAdhesion.php");
require("model/stripe.php");


// Routes
if(isset($_GET["action"])) {
	switch($_GET["action"]) {
		case "accueil":
			(new controleur)->accueil();
			break;
		case "connexion":
			(new controleur)->connexion();
			break;
		case "deconnexion":
			(new controleur)->deconnexion();
			break;
		case "mefaireentendre":
			(new controleur)->mefaireentendre();
			break;
		case "notre_association":
			(new controleur)->notre_association();
			break;
		case "partenaires":
			(new controleur)->partenaires();
			break;
		case "Confidentialite":
			(new controleur)->Confidentialite();
			break;
		case "MesInformations":
			(new controleur)->MesInformations();
			break;
		case "NotreBlog":
			(new controleur)->NotreBlog();
			break;
		case "bonPlan":
			(new controleur)->notreBonPlan();
			break;
		case "ProjetsPedagogiques":
			(new controleur)->projetsPedagogiques();
			break;
		case "paiement":
			(new controleur)->paiement();
			break;
		case "adhesion":
			(new controleur)->adhesion();
			break;
	

		
		
		// Route par défaut : erreur 404
		default:
			(new controleur)->erreur404();
			break;
			
	}
}
else {
	// Pas d'action précisée = afficher l'accueil
	(new controleur)->accueil();
}