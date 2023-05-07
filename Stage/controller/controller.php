<?php


class controleur {
    public function accueil() {
		(new vue)->entete();
		$bonPlan = (new bonplan)->getAllBonPlan();
		$statistique = (new adhesion)->statistique();
		$statistiqueextra = (new adhesion)->statistiqueextra();
		$nombreadhesion = (new adhesion)->nombreadhesion();

		(new vue)->accueil($bonPlan,$statistique,$statistiqueextra,$nombreadhesion);
		(new vue)->footer();

		if(isset($_POST["btsEnvoyerMessage"])){
			(new message)->insertmessage($_POST["Nom"],$_POST["Email"],$_POST["message"]);
			header("Location: ./?action=accueil");
			
		}
	}

	public function notre_association() {
		(new vue)->entete();
		(new vue)->notre_association();
		(new vue)->footer();

		if(isset($_POST["btsEnvoyerMessage"])){
			(new message)->insertmessage($_POST["Nom"],$_POST["Email"],$_POST["message"]);
			header("Location: ./?action=notre_association");
			
		}
		
			
		
	}

	public function adhesion(){
		(new vue)->entete();
		(new vue)->adhesion();
	}

	public function partenaires() {
		(new vue)->entete();
		(new vue)->partenaires();
		(new vue)->footer();
	}
	
	public function erreur404() {
        (new vue)->erreur404();
	}

	public function connexion() {
		if(isset($_POST["connexion"])) 
		{
			
				if((new utilisateur)->connexion($_POST["mail"],$_POST["mdpc"]) === true){

					header("Location: ./?action=accueil");
				}
				else{

					echo '<script type="text/javascript">window.alert("utilisateur ou mot de passe incorrect");</script>';
					(new vue)->connexion();

				}

				
			
		}
		else {
			(new vue)->connexion();
		}

		if(isset($_POST["confirmer"])) {

			$ilestinscrit = (new utilisateur)->estDejaInscrit($_POST["adressemail"]);

			if($ilestinscrit == false)
			{
				if (strlen($_POST["mdp"]) >= 12 && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{12,50}$/', $_POST["mdp"]))
				{
					if($_POST["mdp"] == $_POST["mdpr"])
					{

						$motDePasse = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

						$inscriptionUtilisateur = (new utilisateur)->inscriptionUtilisateur($_POST["nom"],$_POST["prenom"], $_POST["adressemail"], $motDePasse);

						$connexionUtilisateur = (new utilisateur)->connexion($_POST["adressemail"],$_POST["mdp"]);

						header("Location: ./?action=accueil");

					}
					else{

						echo '<script type="text/javascript">window.alert("Les mots de passe de sont pas identiques");</script>';
					}
				}
				else{
					
					echo '<script type="text/javascript">window.alert("Le mot de passe n\'est pas fort");</script>';
				}
			}
			else{
				echo '<script type="text/javascript">window.alert("Vous avez déjà un compte");</script>';
			}	
		}
		
	}

	public function deconnexion(){
		session_destroy();
    	header("Location: ./?action=accueil");
	}

	public function mefaireentendre(){
		if(isset($_SESSION["connexion"])){
			if(isset($_POST["transmettre"])) 
			{
				
				(new proposition)->insertProposition($_POST["titre"],$_POST["description"]);
				header("Location: ./?action=accueil");
						
			}
			else {
				(new vue)->entete();
				(new vue)->proposition();
			}
		}
		else{
			(new controleur)->accueil();
		}
		
		
	}


	public function NotreBlog(){
		(new vue)->entete();
		$lesbonsplans = (new bonplan)->getAllBonPlan();
		$bonPlanPopulaire = (new bonplan)->bonPlanPopulaire();

		(new vue)->NosBonsPlans($lesbonsplans, $bonPlanPopulaire);
	}

	public function notreBonPlan(){
		(new vue)->entete();
		$lebonplan = (new bonplan)->getInfosBonPlan($_GET["id"]);

		(new vue)->notreBonPlan($lebonplan);
		(new vue)->footer();
	}

	public function projetsPedagogiques(){
		(new vue)->entete();
		(new vue)->projetsPedagogiques();
		(new vue)->footer();
	}

	public function MesInformations(){
		
		if(isset($_SESSION["connexion"])){
			

			if(isset($_POST["envoyermessage"])){
				(new message)->insertmessage($_POST["nommessage"],$_POST["mailmessage"],$_POST["contenuemessage"]);
			}
		


			if(isset($_POST["ModifierMail"])){

				if((new utilisateur)->modificationMailUtilisateur($_POST["NouvAdresseMail"],$_POST["motdepasse"]) ==  true){
					
					$message = true;
					$unutilisateur = "";
					(new vue)->entete();
					(new vue)->MesInformations($unutilisateur,$message);
				}
				else{
					$message = false;
					$unutilisateur = "";
					(new vue)->entete();
					(new vue)->MesInformations($unutilisateur,$message);
				}
				
				
			}
			else{
				(new vue)->entete();
			
				$unutilisateur = (new utilisateur)->getInfosUtilisateur();
				$message = "fr";
				(new vue)->MesInformations($unutilisateur,$message);
			}

			if(isset($_POST["ModifierMotdepasse"])){

				
				if (strlen($_POST["nvmdp"]) >= 12 && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{12,50}$/', $_POST["nvmdp"]))
				{
					if($_POST["nvmdp"] == $_POST["verifnvmdp"])
					{

						$motDePasse = password_hash($_POST["nvmdp"], PASSWORD_DEFAULT);

						(new utilisateur)->modificationMdpUtilisateur($_POST["Ancienmdp"], $motDePasse);
					}
							
				}
				
			}

		}
		else{
			(new controleur)->accueil();
		}
		
	}

	public function paiement(){
		(new vue)->entete();
		if(isset($_POST["ad"])){
			$namebut = $_POST["ad"];
			$lesadhesion = (new lesadhesion)->getInfoslesAdhesion($namebut);
			(new vue)->panier($lesadhesion);
			
		  }
		  if(isset($_POST['payer']))
		  {
			  echo 'salut';
		  }

		
		if(isset($_POST['payer'])){
			$cart = new Card();
			$payement = new Stripe(STRIPE_SECRET);
			$payement->startPayement($cart);
		}
		

	}
	

	
}

?>