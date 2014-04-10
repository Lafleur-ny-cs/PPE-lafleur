<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit-admin.css" />
		<title>Boutique-admin</title>
	</head>
	<body>
		<div class="site">
				<header>
					<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
				
				</header>
				<nav>
					<a href="admin.php">Accueil administrateur</a>
					<a href="produit-admin.php">Nos Produits</a>
					<a href="boutiques-admin.php">Nos Boutiques</a>
				</nav>
				<?php 
					try {
						$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
						$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
						$reponseReq = $bdd->query('SELECT * FROM boutiques WHERE categorie="fleurs" ');
						echo '<table class="boutiques">';
						echo '<tr><th>Nom</th><th>Rue</th><th>CP</th><th>Ville</th><th>Boutiques</th><th>ACTION</th>';
					
						while ( $donnees = $reponseReq->fetch() ){
							echo '<tr>';
							//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
							echo '<td>'.$donnees['nom'].'</td>';
							echo '<td>'.$donnees['rue'].'</td>';
							echo '<td>'.$donnees['cp'].'</td>';
							echo '<td>'.$donnees['ville'].'</td>';
							echo'<td><img src="img/boutique_'.$donnees['image'].'"/></td>';
							echo'<td>
												<form id="modif" method="get" action="modif.php" class="action">
													<input type="submit"  id="modif" name="modifBoutique" value="Modifier"/>
													<input type="hidden"  id="modif" name="chBoutique" value="'.$donnees['produit_id'].'"/>
													
												</form>
												<form id="suppr" method="get" action="suppr.php"class="action">
													<input type="submit"  id="suppr" name="supprimer" value="Supprimer"/>
													<input type="hidden" id="suppr" name="suppBoutique" value="'.$donnees['produit_id'].'"/>
													
												</form>';
							echo'</tr>';
								
						}
						echo '</table>';
					}
					catch (Exception $erreur) {
						die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
					}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				?>
		</div>
	</body>
</html>