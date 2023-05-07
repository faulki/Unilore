 <?php

class vue {

	public function entete() {
		
		echo '
		<!DOCTYPE html>
			<html>
				<head>
					<meta charset="UTF-8">
					<meta name=\'viewport\' content=\'width=device-width, initial-scale=1, shrink-to-fit=no\'>

					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
					<link rel=\'stylesheet\' href=\'./css/style.css\'>
					<link rel=\'stylesheet\' href=\'./css/connexion.css\'>
					<link rel="icon" type="image/x-icon" href="/Stage/images/unilore.png">
					<script src=\'https://js.stripe.com/v3/\'></script>
					<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
				     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
				     crossorigin=""/>
				    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
				     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
				     crossorigin=""></script>
				     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  					<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  					<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
  					<script src="/Stage/script.js"></script>


					<title>Unilore</title>
				</head>
				<body>
					<nav class="navbar navbar-expand-lg bg-body-tertiary">
						<div class="container-fluid">
							<a class="navbar-brand" href="?action=accueil" style="font-weight:bold;">Unilore</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
							<ul class="navbar-nav">
								<li class="nav-item">
								<a class="nav-link" aria-current="page" href="?action=accueil">Accueil</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Notre Association</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="?action=notre_association">Présentation</a></li>
										<li><a class="dropdown-item" href="?action=NotreBlog">Notre Blog</a></li>
										<li><a class="dropdown-item" href="?action=ProjetsPedagogiques">Projets Pédagogiques</a></li>
									</ul>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="?action=partenaires">Partenaires</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="?action=adhesion">Adhérer</a>
								</li>';
							if(!isset($_SESSION["connexion"])){
							echo '<a href="?action=connexion">
								<button id="btn-connexion" class="btn btn-outline-success" type="submit">Se connecter</button>
							</a>';
							}
							else{
								echo '<li class="nav-item">
										<a class="nav-link" href="?action=mefaireentendre">Me faire entendre</a>
										</li>
									</ul>
									<li id="menu-connexion" class="nav-item dropdown">
										<a class="nav-link" href="?action=MesInformations">Mes informations</a>
									</li>
									<a href="?action=deconnexion">
										<button id="btn-deconnexion" class="btn btn-outline-danger" type="submit">Se déconnecter</button>
									</a>';
							}
							echo 
							'</div>
						</div>
					</nav>
			
				
		';
			
	}

	public function mdperreur(){
	
	}

	public function fin() {
		echo "
			</body>
			</html>
		";
	}

	public function accueil($bonPlan,$statistique,$statistiqueextra,$nombreadhesion) {
		$validImage = true;
		$validActive = true;
		$compteur = 0;
		foreach($bonPlan as $value){
			$compteur += 1;
		}
		echo "
			<div class='mainAccueil'>
				<div class='innerAccueil'>
					<h1>Un bonheur pour tous les étudiants</h1>
					<p>
						<strong>Unilore vient d'arriver ! </strong>Au service des étudiants, <strong>Nous voudrions savoir ce que vous voulez. </strong>Alors s'il vous plaît, laissez nous vos suggestions via ce formulaire :
					</p>";
					if(!isset($_SESSION["connexion"]))
					{
						echo "<a href='?action=connexion'>
								<button type='button' class='btn btn-outline-info'>Me faire entendre</button>
							</a>";
					}
					else{
						echo "<a href='?action=mefaireentendre'>
								<button type='button' class='btn btn-outline-info'>Me faire entendre</button>
							</a>";
					}
					echo  "
				</div>
				<div class='tabAccueil'>
					<p style='text-align: center; padding-bottom: 3em;'><span style='color: green;'>Une seule contribution</span> pour être adhérent jusqu'en Juin 2024 :</p>
				</div>
				<div class='pricing-plan-container'>
					<section class='pricing-plan'> 
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Basique, Simple</h1>
							<h2 class='pricing-plan__summary'>Pour un bon commencement</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée à 2€ pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>6,99€</strong> toute l'année</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€5</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_6oEcO4cWK9NP6yI3cd' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
					<section class='pricing-plan pricing-plan--highlighted'>
						<div class='pricing-plan__special-text'>Recommandé</div>
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Extra</h1>
							<h2 class='pricing-plan__summary'>Celui qui vaut Le Coup !</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée à 1€ pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>6,99€</strong> toute l'année</li>
								<li class='pricing-plan__feature'>1 code de parrainage Basique pour 3.50€</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€7</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_9AQcO42i63pre1a6oq' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
					<section class='pricing-plan'>
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Fondateur</h1>
							<h2 class='pricing-plan__summary'>Pour les Perfectionnistes</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore Finition Métal</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée gratuite pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>5,99€</strong> toute l'année</li>
								<li class='pricing-plan__feature'>2 code de parrainage Basique pour 5€</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€10</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_5kA5lCf4Sgcd4qA003' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
				</div>
				<div class='discord-accueil'>
					<div class='discord-accueil__text'>
						<p id='discord-accueil__1'><strong>Connecter-vous avec plus de 1000 étudiants de l'Université de Lorraine avec nous...</strong></p>
						<h2 id='discord-accueil__2'>Le discord D'Unilore</h2>
						<p id='discord-accueil__3'><strong>Réunissant des personnes de toutes les filières ainsi que le BDE du campus SHS-ALL Nancy, nous sommes le plus vaste réseau d'étudiant de la région Grand-Est !</strong></p>
						<p id='discord-accueil__4'><strong>Venez discuter, débattre, apprendre, suivre l’actualité, partager et récupérer vos cours et profiter aussi d’outils et d’IA comme MidJourney ou ChatGTP.</strong></p>
					</div>
					<div class='discord-accueil__image'>
						<a href='http://discord.gg/jQFc22bG6v' id='discord-picture'><img class='discord-accueil__picture' src='./images/discord_student.png' alt='Discord Student'></a>
					</div>
				</div>
				<div class='bonPlan-accueil'>
					<div class='car bonPlan-accueil__car'>
						<div id='carouselExampleIndicators' class='carousel slide imgs carousel-control-width:15%' data-bs-ride='true'>
							<div class='carousel-indicators'>";
							for($i=1;$i<=$compteur;$i++){
								if($validActive){
									echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
									$validActive = false;
								}
								else{
									echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='".($i-1) ."' aria-label='Slide ".$i."'></button>";
								}
							}
							echo "</div>
							<div class='carousel-inner'>";
							foreach($bonPlan as $value){
								if($validImage){
									echo "<div class='carousel-item active'>
											<img src='/Stage/images/".$value["image_bonplan"]."' class='d-block w-100 imgcaraccueil' alt='...'>
										</div>";
									$validImage = false;
								}
								else{
									echo "<div class='carousel-item'>
											<img src='/Stage/images/".$value["image_bonplan"]."' class='d-block w-100 imgcaraccueil' alt='...'>
										</div>";
									}
							}
							echo "
							</div>
							<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Previous</span>
							</button>
							<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
							<span class='carousel-control-next-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Next</span>
							</button>
						</div>
					</div>
					<div class='bonPlan-accueil__text'>
						<p id='discord-accueil__1'><strong>Lisez ou écrivez sur un blog dédié aux étudiants et à la vie étudiante en général !</strong></p>
						<h2 id='discord-accueil__2'>Le Blog Unilore</h2>
						<p id='discord-accueil__3'><strong>Que vous soyez à la recherche de plus de bons plans, de conseils ou que vous soyez curieux des projets et travaux de certains…</strong></p>
						<p id='discord-accueil__4'><strong>Vous trouverez toute sorte de contenus sur le blog, un espace ouvert à tous ou tout le monde peut apporter sa contribution.</strong></p>
					</div>
				</div>
				<div class='pp-accueil'>
					<div class='discord-accueil__text'>
						<p id='discord-accueil__1'><strong>N’arrêtez jamais d’apprendre avec notre association et ses projets…</strong></p>
						<h2 id='discord-accueil__2'>Nos Projets Pédagogiques</h2>
						<p id='discord-accueil__3'><strong>Un peu de culture G et de nouvelles connaissances sans aucun stress dans un évent sympathique, ça vous intéresse ?</strong></p>
						<p id='discord-accueil__4'><strong>Ateliers cuisine internationale, ciné, débats, projets étudiants et plus encore, nous souhaitons mettre en place un gros projet pédagogique par mois à terme.</strong></p>
					</div>
					<div class='discord-accueil__image'>
						<img class='discord-accueil__picture' src='./images/projetPedagogique.png' alt='Projet pédagogique Unilore'></a>
					</div>
				</div>
				<div class=''>
				
						<h2 id='discord-accueil__2' style='text-align: center;'>Nos statistiques :</h2>

					<div class=''>";

					$statbasique = $statistique["pbasique"];
					$statextra = $statbasique + $statistiqueextra["pextra"];
						echo "<div class='counter'>
							    <div class='box'>
							      
							        <div class='num'>".$nombreadhesion["nb"]."</div>
							        Adhérents Unilore

							    </div>
							</div>

							<div>
						
								<div class='piechart' style='background-image: conic-gradient( #1BA577 ".$statbasique."%, #0F8E72 0 ".$statextra."%, #35B8B2 0);' >
								</div>
							</div>

							
								<div class='coucou'>
									<div class='square' style='background-color: #1BA577;'></div>
										<span>Adhésion Simple, Basique</span>
								</div>
								<div>
									<div class='square' style='background-color: #0F8E72;'></div>
										<span>Adhésion Extra</span>
								</div>
								<div>
									<div class='square' style='background-color: #35B8B2;'></div>
										<span>Adhésion Fondateur</span>
								</div>
							

					</div>
				</div>

			</div
		";
	}

	public function notre_association(){
				echo '<div>
						<div class="container">
							<div class="row">
								<div class="col">
								</div>
								<div class="col-7">
									<div class="car">
										<div id="carouselExampleIndicators" class="carousel slide imgs carousel-control-width:15%" data-bs-ride="true">
											<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
											</div>
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div id="map" class="d-block w-100 imgcar"></div>	
													<script>
													var map = L.map("map").setView([48.6954406,6.1672658], 16);

													L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
													    maxZoom: 19,
													    attribution: "&copy; <a href=\'http://www.openstreetmap.org/copyright\'>OpenStreetMap</a>"
													}).addTo(map);
													var marker = L.marker([48.6954406,6.1672658]).bindPopup("Unilore, 23 Bd Albert 1er, 54000 Nancy").addTo(map);</script>
												</div>
												<div class="carousel-item">
													<img src="/Stage/images/imga.png" class="d-block w-100 imgcar" alt="...">
												</div>
											</div>
											<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
											</button>
										</div>
									</div>
								</div>
								<div class="col">
								</div>
							</div>
						</div>
						<div class="presentation__text">
							<div class="presentation__text__1">
								<h4>Unilore, c\'est quoi ?</h4>
								<p>Tout d’abord, Unilore ce sont des humains, très talentueux, certes, mais ce sont avant tout des humains. Notre objectif, c’est de faire en sorte que le maximum de personnes possible puissent voir leurs conditions de vie s’améliorer. En effet, c’est ce à quoi nous souhaitons contribuer. C’est-à-dire qu’on parle de répondre aux besoins des étudiants. Donc, créer des liens et faire faire des économies tout en offrant du divertissement et de la consommation, chose nécessaire dans notre nouvelle société. Unilore c’est le moyen de parvenir à cette fin.</p>
								<p>Pour ce faire, nous avons supprimé la limite de l’association consacrée aux filières puisqu’elle ne permet pas réellement de s’associer avec le plus grand nombre. Chose que nous désirons. Réunir un grand nombre d’adhérents de tous campus et toutes filières nous permet de constituer une véritable communauté. Aussi, constituer des partenariats titanesques et ainsi attirer pleins d’autres adhérents. En effet, C’est un cercle vertueux. Et notre projet est tout simplement d’agrandir ce cercle au plus grands nombre pour améliorer la vie étudiante.</p>
							</div>
							<div class="presentation__text__2">
								<h4>Unilore, c\'est qui ? </h4>
								<p>Au début, Unilore, c’est une équipe de 20 potes de plusieurs filières sur le campus ALL-SHS de Nancy. Aussi, d’autres campus pour 4 d’entre nous. Et bientôt, ça sera la même chose, mais multiplié par 2 ou trois. Tout simplement pour constituer une association qui fonctionne et de mieux en mieux. Tout cela, en donnant la chance à tous ceux qui le souhaitent et le peuvent de s’impliquer dans cette cause.</p>
								<p>Notre équipe contient des gens de tous les horizons, ce que nous souhaitons tout d’abord… Ce sont tout simplement des personnes ayant une grande force de volonté, une certaine discipline ainsi qu’une capacité de réflexion autonome. En passant, ici l’amour et l’entraide est au premier plan. En outre, l’égoïsme primaire est mis de côté.</p>
							</div>
							<div class="presentation__text__3">
								<h4>Unilore, Pourquoi ?</h4>
								<p>En craftant cette association, nous nous sommes rendus compte de la puissance de la chose. En effet, s’associer pompe énormément d’avantages individuels. Aussi, tout le monde devrait exister sous la forme d’association, y compris les groupes de potes. Ok, on abuse, mais en vrai, c’est tellement un avantage dans la société comme statut. Aussi, et on le dit haut et fort, Unilore c’est aussi bien pour le bien commun que pour le bien de chacun. Parce que nous, ça marche très bien, alors autant l’assumer. Nous consommons plus et mieux en dépensant moins.</p>
								<h4>Pourquoi vous et pas une autre ?</h4>
								<p>L’argent avant les humains comme diraient les autres. Mais pour le coup, de manière générale, nous ne vous faisons pas payer pour entrer dans des soirées. Et surtout pas à des prix scandaleux (5€ par exemple, oui ça existe). Non, de très loin, nous nous inspirons et regardons ce que d’excellentes associations comme le GLEG ou encore les AELEA le font. Nous souhaitons nous positionner dans le haut du panier et pour tous les étudiants et même donner 1€ peut pour beaucoup être une restriction, certes, c’est peut-être abusé, mais on comprend.</p>
							</div>
							<div class="presentation__text__4">
								<p>Nous touchons beaucoup de monde, nos adhésions comme nos avantages et évènements restent à prix mini. Tous nos bénéfices sont très rapidement reversés dans d’autres projets. Oui, notre souhait est aussi de vous accompagner de manière durable pendant une belle partie de votre scolarité !  D’ailleurs, nous ne sommes pas juste ouvert aux étudiants, si vous souhaitez inviter votre mère ou votre cousin lycéen à adhérer à notre association pour payer moins cher, c’est à la fois avantageux pour eux et pour vous.</p>
							</div>
						</div>
					  </div>
					</body>
				</html>
		
		';
	}

	public function partenaires() {
		echo "
			<div class='container-partenaires'>
				<div class='partenaires__titre'>
					<p>Nos Partenaires, Même Si En Vrai, On Préfère Parler D'amis...</p>
					<h2>Partenaires D'Unilore</h2>
				</div>
				<div class='partenaires__image'>
					<div>
						<img class='partenaires__picture' src='./images/afficheFilm.png'>
					</div>
					<div class='partenaires__picture__text'>
						<h3>DES ÉVÈNEMENTS TOUTE L'ANNÉE GRÂCE À TOUS LES PARTENAIRES D'UNILORE</h3>
						<p>En premier lieu, nous travaillons au quotidien avec des gens talentueux, grâce à qui notre association est reconnue et peut développer de nombreux projets au profit de la communauté </p>
						<h3>PARTENARIATS UNIQUES POUR CHACUN DE NOS AMIS</h3>
						<p>À savoir, mais nous aussi, nous sommes une équipe avec de grands talents et nous comptons travailler pour soutenir toutes associations, entreprises et personnes qui nous aideraient à accomplir notre mission pour la communauté.</p>
					</div>
				</div>
				<div class='partenaires__titre__2'>
					<h2>Unilore Et Ses Partenaires</h2>
					<p>Unilore travaille avec de nombreuses entreprises et personnalités de talents pour vous offrir le meilleur...</p>
				</div>
				<div class='slider'>
					<div class='slide-track'>
						<div class='slide'>
							<img src='./images/kinepolisLogo.png' height='100' width='250' alt='' />
						</div>
						<div class='slide'>
							<img src='./images/googleLogo.png' height='100' width='250' alt='' />
						</div>
						<div class='slide'>
							<img src='./images/crousLogo.png' height='100' width='250' alt='' />
						</div>
						<div class='slide'>
							<img src='./images/creditMutuelleLogo.png' height='100' width='250' alt='' />
						</div>
						<div class='slide'>
							<img src='./images/LaserMax.png' height='100' width='250' alt='' />
						</div>
						<div class='slide'>
							<img src='./images/midjourneyLogo.png' height='100' width='250' alt='' />
						</div>
					</div>
				</div>
			</div>
		";
	}

	public function footer() {
		echo "
			<footer id='footer'>
				<div class='envoiMailFollow'>
					<section class='sectionMail'>
						<h2>Nous contacter</h2>
						<form method='POST' action=''>
							<div class='fields'>
								<div class='field half'>
									<input type='text' name='Nom' id='nomEnvoiMail' placeholder='Nom' required>
								</div>
								<div class='field half'>
									<input type='email' name='Email' id='mailEnvoiMail' placeholder='Email' required>
								</div>
								<div class='field'>
									<div>
										<textarea name='message' id='messageEnvoiMail' placeholder='Votre message' rows='1' style='overflow: hidden; resize: none; height: 79px;' required></textarea>
									</div>
								</div>
							</div>
							<ul class='actions'>
								<li>
									<input type='submit' name='btsEnvoyerMessage' value='Envoyer' class='btnEnvoyer'>
								</li>
							</ul>
						</form>
					</section>
					<section>
						<h2 class='nousSuivre'>Nous suivre</h2>
						<ul class='icons'>
							<li>
								<a href='http://discord.gg/jQFc22bG6v'>
									<img alt='discord Unilore' src='./images/discord.png'>
								</a>
							</li>
							<li>
								<a href='http://instagram.com/unilore.fr'>
									<img alt='instagram unilore' src='./images/instagram.png'>
								</a>
							</li>
						</ul>
					</section
				</div>
			</footer>
		";
	}

	public function connexion(){
		echo '<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
				<meta name=\'viewport\' content=\'width=device-width, initial-scale=1, shrink-to-fit=no\'>

				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
				<link rel=\'stylesheet\' href=\'./css/style.css\'>
				<link rel=\'stylesheet\' href=\'./css/connexion.css\'>
				<script src="https://js.stripe.com/v3/"></script>


				<title>Unilore</title>
			</head>
			<div class="titreConnexion">
				<h1><a href="?action=accueil">UNILORE</a></h1>
			</div>
			<body>
			
			<div class="login-wrap">
			
					<div class="login-html">
						<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Connexion</label>
						<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Inscription</label>
						<div class="login-form">
						<form method="POST" action="">
							<div class="sign-in-htm">
								<div class="group">
									<label class="label">Mail</label>
									<input id="mail" name="mail" type="text" class="input">
								</div>
								<div class="group">
									<label class="label">Mot de Passe</label>
									<input id="mdp"  name="mdpc" type="password" class="input" data-type="password">
								</div>
								<div class="group">
								
									<input type="submit" class="button" name="connexion" value="Connexion">
								</div>
								<div class="hr"></div>
								<div class="foot-lnk">
									<a href="#forgot">Mot de passe oublié</a>
								</div>
							</div>
							<div class="sign-up-htm">
								<div class="group">
									<label class="label">Nom</label>
									<input id="nom" name="nom" type="text" class="input">
								</div>
								<div class="group">
									<label class="label">Prenom</label>
									<input id="prenom"  name="prenom" type="text" class="input">
								</div>
								<div class="group">
									<label class="label">Adresse Mail</label>
									<input id="adressemail"  name="adressemail" type="text" class="input">
								</div>
								<div class="group">
									<label class="label">Mot de passe</label>
									<input id="mdp"  name="mdp" type="password" class="input" data-type="password">
								</div>
								<div class="group">
									<label class="label">Répéter le mot de passe</label>
									<input id="mdpr"  name="mdpr" type="password" class="input" data-type="password">
								</div>
								<div class="group">
									<input type="submit" class="button" name="confirmer" >
						
								</div>
								<div class="foot-lnk djme">
									<label for="tab-1">Déjà membre ?</a>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
				</body>
		</html>
				
				';

	}
	
	public function proposition(){
		
		echo "
		<div class='envoiProposition'>
					<section class='sectionproposition'>
						<h2>Votre proposition</h2>
						<form method='POST' action=''>
							<div class='propo'>
								<div class='propo half'>
									<input type='text' name='titre' id='TitreProposition' placeholder='Titre' required>
								</div>
								<div class='pro'>
									<div>
										<textarea name='description' id='messageEnvoiMail' placeholder='Description' rows='1' style='overflow: hidden; resize: none; height: 79px;' required></textarea>
									</div>
								</div>
							</div>
							<ul class='actionspropo'>
								<li>
									<input type='submit' name='transmettre' value='Envoyer' class='btnProposer'>
								</li>
							</ul>
						</form>
					</section>
				</div>";
	}


	public function NosBonsPlans($lesbonsplans, $bonPlanPopulaire){

		echo "

			<div class=\"container\">
				<div class=\"row row-cols-3\">
		";

		foreach($lesbonsplans AS $value){
				echo '<div class="col">';
					echo '<div class="card">
								<img src=" /Stage/images/'.$value["image_bonplan"].'" class="card-img-top">
								<div class="card-body" style="border-top: 1px solid grey;">
									<h5 class="card-title">'.$value["titre_bonplan"].'</h5>
									<p class="card-text">'.var_export(substr($value["description_bonplan"], 0, 220), true)." etc...".'</p>
									<a href="?action=bonPlan&id='.$value["id_bonplan"].'" class="btn btn-primary">Voir plus</a>
								</div>
							</div>';
					if($bonPlanPopulaire["id_bonplan"] == $value["id_bonplan"]){
						echo '<div class="bonPlanPopulaire__text">Le plus populaire</div>';
					}
			    echo '</div>';
			}

		echo "
				</div>
			</div>
		";
	}

	public function notreBonPlan($lebonplan)
	{
		(new bonplan)->insertClick($_GET["id"]);
		echo "
			<div class='bonplan'>
				<div class='bonplan__title'>
					<h2>".$lebonplan["titre_bonplan"]."</h2>
				</div>
				<div class='bonplan__desc'>
					<p>".$lebonplan["description_bonplan"]."</p>
				</div>
			</div>
		";
	}
	
	public function adhesion(){
		echo "<div class='tabAccueil'>
					<p style='text-align: center; padding-bottom: 3em;'><span style='color: green;'>Une seule contribution</span> pour être adhérent jusqu'en Juin 2024 :</p>
				</div>
				<div class='pricing-plan-container'>
					<section class='pricing-plan'> 
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Basique, Simple</h1>
							<h2 class='pricing-plan__summary'>Pour un bon commencement</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée à 2€ pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>6,99€</strong> toute l'année</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€5</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_6oEcO4cWK9NP6yI3cd' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
					<section class='pricing-plan pricing-plan--highlighted'>
						<div class='pricing-plan__special-text'>Recommandé</div>
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Extra</h1>
							<h2 class='pricing-plan__summary'>Celui qui vaut Le Coup !</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée à 1€ pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>6,99€</strong> toute l'année</li>
								<li class='pricing-plan__feature'>1 code de parrainage Basique pour 3.50€</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€7</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_9AQcO42i63pre1a6oq' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
					<section class='pricing-plan'>
						<div class='pricing-plan__header'>
							<h1 class='pricing-plan__title'>Fondateur</h1>
							<h2 class='pricing-plan__summary'>Pour les Perfectionnistes</h2>	
						</div>
						<div class='pricing-plan__description'>
							<ul class='pricing-plan__list'>
								<li class='pricing-plan__feature'>Carte Adhérent Unilore Finition Métal</li>
								<li class='pricing-plan__feature'>Accès à notre carte partenaire pour bénéficier de réductions partout dans la ville de Nancy</li>
								<li class='pricing-plan__feature'>Réductions sur nos voyages, évènements, vêtements & goodies</li>
								<li class='pricing-plan__feature'>Entrée gratuite pour nos soirées dans les bars publics</li>
								<li class='pricing-plan__feature'>Place de cinéma à <strong>5,99€</strong> toute l'année</li>
								<li class='pricing-plan__feature'>2 code de parrainage Basique pour 5€</li>
							</ul>
						</div>
						<div class='pricing-plan__actions'>
							<p class='pricing-plan__cost'><strong>€10</strong></p>
							<p class='pricing-plan__text'>par ans</p>";
							if(isset($_SESSION["connexion"])){
								echo "<a href='https://buy.stripe.com/test_5kA5lCf4Sgcd4qA003' class='pricing-plan__button'>Souscrire</a>";
							}
							else{
								echo "<a href='?action=connexion' class='pricing-plan__button'>Souscrire</a>";
							}
						echo "</div>
					</section>
				</div>";
	}

	public function MesInformations($unutilisateur,$message){

		echo "<div class='align-items-start'>
		<div class='nav flex-column nav-pills me-3' id='v-pills-tab' role='tablist' aria-orientation='vertical'>
		<button class='nav-link active' id='v-pills-home-tab' data-bs-toggle='pill' data-bs-target='#v-pills-home' type='button' role='tab' aria-controls='v-pills-home' aria-selected='true'><img src='/Stage/images/accueil.png'>Accueil</button>
		  <button class='nav-link' id='v-pills-profile-tab' data-bs-toggle='pill' data-bs-target='#v-pills-profile' type='button' role='tab' aria-controls='v-pills-profile' aria-selected='false'>Confidentialité</button>
		  <button class='nav-link' id='v-pills-messages-tab' data-bs-toggle='pill' data-bs-target='#v-pills-messages' type='button' role='tab' aria-controls='v-pills-messages' aria-selected='false'>Mes données</button>
		</div>
		<div class='tab-content' id='v-pills-tabContent'>
		  <div class='tab-pane fade show active' id='v-pills-home'>
		
			<div class='container'>
			<div class='row mesInfos'>
				<div class='col-5'>
					<div class='card'>
						<div class='card-header'>
						Conseils de sécurité
						</div>
						<div class='card-body'>
							<h5 class='card-title'>Mots de passe</h5>
							<p class='card-text'>Les mots de passe que vous avez enregistrés sont en cours d'analyse. Nous vérifions qu'ils ne présentent aucun problème de sécurité afin de protéger votre compte.</p>
						</div>
					</div>
				</div>
				<div class='col-5'>
					<div class='card'>
						<div class='card-header'>
						Données et confidentialité
						</div>
						<div class='card-body'>
							<h5 class='card-title'>Informations privé</h5>
							<p class='card-text'>Informations personnelles que vous avez enregistrées dans votre compte. Ces infomations sont privées et non visible par d'autres utilisateurs.</p>
					
						</div>
					</div>
				</div>
			</div>
			<div class='col-10 mesInfos2'>
				<div class='card'>
					<div class='card-header'>
					Durées de stockage de vos données
					</div>
					<div class='card-body'>
						<p class='card-text'>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver automatiquement les commentaires au lieu de les laisser dans la file de modération.



						Pour les comptes qui s’inscrivent sur notre site, nous stockons les données personnelles indiquées dans leur profil. Tous les comptes peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment.</p>
						
					</div>
				</div>
			</div>
		</div>
		  </div>
		  <div class='tab-pane fade' id='v-pills-profile' role='tabpanel' aria-labelledby='v-pills-profile-tab' tabindex='0' style='margin-top: -4%;'>
			
		  
		  <div class='envoiInformation'>
					  <section class='sectionInformation'>
						  <h2>Changer mon adresse mail</h2>
						  <form method='POST' action=''>
							  <div class='remail'>
								  <div class='mailre'>
									  <input type='text' name='NouvAdresseMail' id='NouvMail' placeholder='Nouvelle Adresse Mail' required>
								  </div>
								  <div class='mailre'>
									  <div>
									  <input type='password' name='motdepasse' id='NouvMail' placeholder='Mot de Passe' required>
									  </div>
								  </div>
							  </div>
							  <ul class='actionsremail'>
								  <li>
									  <input type='submit' name='ModifierMail' value='Modifier' class='btnModifiermail' data-bs-target='#exampleModal'>
								  </li>
							  </ul>
						  </form>
					  </section>
				  </div>";
  
				  if(isset($_POST["ModifierMail"])){
					  if($message == true){
  
						  echo '
						  <div class="modal fade bd-example-modal-sm" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
								...
								</div>
							</div>
							</div>';
					  }
					  else if($message == false){
						  echo '<div class= "message">
								  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
									  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
										  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									  </symbol>
								  </svg>
								  <div class="alert alert-danger align-items-center" role="alert">
								  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
								  <div>
								  Votre mot de passe est incorrect!!
								  </div>
							  </div>
						  </div>';
					  }
				  }
  
				  echo "
				  <div class='envoiInformation'>
							  <section class='sectionInformation'>
								  <h2>Changer le mot de passe</h2>
								  <form method='POST' action=''>
									  <div class='remail'>
										  <div class='mailre'>
											  <input type='password' name='Ancienmdp' id='NouvMail' placeholder='Ancien Mot de Passe' required>
										  </div>
										  <div class='mailre'>
											  <div>
											  <input type='password' name='nvmdp' id='NouvMail' placeholder='Nouveau Mot de Passe' required>
											  </div>
										  </div>
										  <div class='mailre'>
											  <div>
											  <input type='password' name='verifnvmdp' id='NouvMail' placeholder='Répéter Nouveau Mot de Passe' required>
											  </div>
										  </div>
									  </div>
									  <ul class='actionsremail'>
										  <li>
											  <input type='submit' name='ModifierMotdepasse' value='Modifier' class='btnModifiermail'>
										  </li>
									  </ul>
								  </form>
							  </section>
						  </div>

		  </div>
		  <div class='tab-pane fade' id='v-pills-disabled' role='tabpanel' aria-labelledby='v-pills-disabled-tab' tabindex='0'>...</div>
		  <div class='tab-pane fade' id='v-pills-messages' role='tabpanel' aria-labelledby='v-pills-messages-tab' tabindex='0'>...</div>
		  <div class='tab-pane fade' id='v-pills-settings' role='tabpanel' aria-labelledby='v-pills-settings-tab' tabindex='0'>...</div>
		</div>
	  </div>";
		/*echo '<div id="main">
				<div class="menuinfos">
				<button type="submit" name="nouscontacter" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="width: 101%;">Nous Contacter</button>


				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Votre Message</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
					<div class="modal-body">
					
					<form method="POST" action="">
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Nom:</label>
							<input type="text" name="nommessage" value='.$unutilisateur["nom_user"].' class="form-control" id="recipient-name" required readonly>
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Mail:</label>
							<input type="email" name="mailmessage" value='.$unutilisateur["mail_user"].' class="form-control" id="recipient-name" required readonly>
						</div>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">Message:</label>
							<textarea class="form-control" name="contenuemessage" id="message-text" required></textarea>
						</div>
					
					
						
					</div>
					<div class="modal-footer">
						<button type="submit" name="envoyermessage" class="btn btn-primary">Envoyer</button>
					</div>
					</form>
					</div>
					
					
				</div>
				
				</div>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 101%;">Politique de confidentialité</button>

						<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="staticBackdropLabel">Politique de confidentialité</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p>Confidentialité rime avec respect. En effet, nous écrivons ceci pour le SEO.</p>

								<h1>Qui sommes-nous ?</h1>
								<p>Tout d’abord, l’adresse de notre site est : https://unilore.fr.</p>
								<h1>Commentaires</h1>
								<p>Ensuite, quand vous laissez un commentaire sur notre site, les données inscrites dans le formulaire de commentaire. De plus, votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables...</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voir plus</button>
								
							</div>
							</div>
						</div>
						</div>
			  </div>
				</div>
			
				<div class="contenueinfo">
				Contenu
				</div>
			</div>';*/
	}

	public function projetsPedagogiques() {
		echo '
			<div class="container-pp">
				<div class="container-pp__1">
					<div class="pp-1__image">
						<img class="pp-1__picture" src="./images/projetPedagogique.png" alt="Projet pédagogique Unilore"></a>
					</div>
					<div class="pp-1__text">
						<p id="pp-1__text_1"><strong>En tant qu’étudiant, l’argent, c’est bien. Mais le savoir pour vivre et faire de l’argent, c’est beaucoup mieux. Des idées de projets ? </strong></p>
						<h2 id="pp-1__text_2">Projets Pédagogiques</h2>
						<p id="pp-1__text_3"><strong>Si oui, n’hésite pas à nous contacter sur Discord, Instagram ou par mail : contact@unilore.fr</strong></p>
						<p id="pp-1__text_4"><strong>Ainsi, nous allons développer des choses ensemble et contribuer à l’amélioration de la vie étudiante.</strong></p>
					</div>
				</div>
				<div class="container-pp__2">
					<div class="pp-2__text">
						<p id="pp-2__text_1"><strong>Parce que c’est important d’être indépendant de Canva et de pouvoir utiliser toute sa créativité…</strong></p>
						<h2 id="pp-2__text_2">Ateliers Adobe</h2>
						<p id="pp-2__text_3"><strong>Des étudiants de l’école Pigier Nancy viendront pour organiser quelques cours sur les différents logiciels de la suite Adobe, un vrai plus pour votre CV</strong></p>
						<p id="pp-2__text_4"><strong>Idéal pour les étudiants qui ont des projets et qui souhaitent les développer plus largement.</strong></p>
					</div>
					<div class="pp-2__image">
						<img class="pp-2__picture" src="./images/adobe.png" alt="Projet pédagogique Unilore"></a>
					</div>
				</div>
				<div class="container-pp__3">
					<div class="pp-3__image">
						<img class="pp-3__picture" src="./images/films.png" alt="Cinema Unilore"></img>
					</div>
					<div class="pp-3__text">
						<p id="pp-3__text_1"><strong>Assister à une conférence autour d’une œuvre avant de regarder l’œuvre pour mieux la comprendre…</strong></p>
						<h2 id="pp-3__text_2">Ciné-Conférences</h2>
						<p id="pp-3__text_3"><strong>Dans quelle mesure l’Histoire a contribué à la création de l’univers de Game Of Thrones ?</strong></p>
						<p id="pp-3__text_4"><strong>Revisionnez des œuvres cultes et apprenez à mieux les saisir et à les lier avec les enseignements dispensés sur notre campus.</strong></p>
					</div>
				</div>
				<div class="container-pp__4">
					<div class="pp-4__text">
						<p id="pp-4__text_1"><strong>J’ai faim, et franchement, c’est pas facile de se nourrir et de varier les plats, surtout en tant qu’étudiant…</strong></p>
						<h2 id="pp-4__text_2">Journée Découverte Culinaire</h2>
						<p id="pp-4__text_3"><strong>Une journée qui se passera au travers de dégustations d’amuse-gueules d’autres cultures !</strong></p>
						<p id="pp-4__text_4"><strong>De plus, nous prévoyons d’offrir gratuitement à tous des recettes élaborés et diversifiés pour seulement 1€ histoire de varier et de vous faire plaisir !</strong></p>
					</div>
					<div class="pp-4__image">
						<img class="pp-4__picture" src="./images/culinaire.png"></img>
					</div>
				</div>
				<div class="container-pp__5">
					<div class="pp-5__image">
						<img class="pp-5__picturet" src="./images/ateliers.png"></img>
					</div>
					<div class="pp-5__text">
						<p id="pp-4__text_1"><strong>Créer un site, c’est difficile et parfois couteux si on veut se mesurer aux autres, changeons selon…</strong></p>
						<h2 id="pp-4__text_2">Ateliers Création De Site Professionnel</h2>
						<p id="pp-4__text_3"><strong>Créer un site très propre et très pro, c’est très facile, mais personne ne montre réellement comment.</strong></p>
						<p id="pp-4__text_4"><strong>C’est tout le concept de nos ateliers qui vous permettront de développer un site pour le plaisir, pour vous ou encore pour vos projets. </strong></p>
					</div>
				</div>
			</div>
		';
	}

	public function panier($product){


		echo "
			<h1>Panier :</h1>
			<form method='POST' action=''>
				<table>
					<tr>
						<th>Désignation des articles</th>
						<th>Prix unitaire</th>
					</tr>
		";
		
			foreach($product as $value) {
			
				echo "<tr><td>".$value['nom_adhesion_pre']."</td>
						<td>".$value['prix_adhesion_pre']." €</td></tr>";
				
			}
			echo "
				</table>

				<button type='submit' id='checkout-button' class=\"btn btn-primary\" name='payer'>Payer</button>
			</form>
		
		<script>
		var checkoutButton = document.getElementById('checkout-button');
		checkoutButton.addEventListener('click', function () {
			fetch('/payment/checkout')
				.then(function (response) {
					return response.json();
				})
				.then(function (session) {
					stripe.redirectToCheckout({
						sessionId: session.sessionId
					});
				});
		});
		</script>";
	}

	
	
	public function erreur404() {
		http_response_code(404);

		$this->entete();

		echo "
			<h1>Erreur 404 : page introuvable !</h1>
			<br/>
			<p>
				Cette page n'existe pas ou a été supprimée !
			</p>
		";

		$this->fin();
	}


	
}
