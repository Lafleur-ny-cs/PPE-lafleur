<?php session_start()
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/suppr.css" />
		<title>Suppression?</title>
	</head>
	<body background="prairie2.css" style="background-repeat:no-repeat;">
		<?php if(isset($_SESSION['txtLogin'])){?>		
				
				<div class="site">
					<header>
						<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
							
						</header>
						<nav>
							<a href="admin.php">Accueil</a>
						<a href="produit-admin.php">Nos Fleurs</a>
						<a href="boutiques-admin.php">Nos Boutiques</a>
						<a href="index.php">Deconnexion</a>
							
							<?php
							if(isset($_GET['supprimer'])){
								$id=$_GET['supprimer'];
							
								try {
									$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
									$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
									$reponseReq = $bdd->query('SELECT * FROM produits WHERE categorie="fleurs" AND produit_id='.$id.'' );
									echo '<table class="fleur">';
									echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Fleurs</th><th></th>';
								
									while ( $donnees = $reponseReq->fetch() ){
										echo '<tr>';
										//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
										echo '<td>'.$donnees['nom'].'</td>';
										echo '<td>'.$donnees['sous_titre'].'</td>';
										echo '<td>'.$donnees['prix'].'</td>';
										echo'<td><img src="img/fleurs/'.$donnees['image'].'"/></td>';
										echo'</tr>';
										echo '</table>';
										echo'<form id="supprimer" name="supprimer" method="get" action="suppr.php">
												<fieldset>
													<legend>Supprimer</legend>
													<h1>Est vous sur de vouloir supprimer ?</h1>
													<input id="suppr" name="b1" type="submit" value="Oui" /><input name="b2" type="reset" value="Non"/>
													<input id="suppr" name="suppr" type="hidden" value="'.$donnees['produit_id'].'"/>
												</fieldset>
											</form>';
								
											
									}
									
								}
								catch (Exception $erreur) {
									die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
								}
							}
							?>
							
						</nav>
				
				
				
			</div>
		<?php 
			}
			else{
				echo'Espace res�rv� au administrateur';
			}
		
		
		?>
		</body>
	</html>