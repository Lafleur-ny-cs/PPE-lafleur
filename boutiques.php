<!DOCTYPE html>
<html>
	<head>
	<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit.css" />
		<title>Boutiques</title>
	</head>
	<body background="prairie2.css" style="background-repeat:no-repeat;">
			<div class="site">
				<header>
					<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
				
				</header>
				<nav>
					<a href="index.php.html">Accueil</a>
					<a href="produit.php">Nos Produits</a>
					<a href="boutiques.php">Nos Boutiques</a>
					<a href="connexion.php">Connexion</a>
				</nav>
				<?php
			try {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
				$reponseReq = $bdd->query('SELECT * FROM boutiques');
				echo '<table class="boutique">';
				echo '<tr><th>Nom</th><th>Rue</th><th>CP</th><th>Ville</th><th>Boutiques</th>';
				while ( $donnees = $reponseReq->fetch() ){
					echo '<tr>';
					echo '<td>'.$donnees['nom'].'</td>';
					echo '<td>'.$donnees['rue'].'</td>';
					echo '<td>'.$donnees['cp'].'</td>';
					echo '<td>'.$donnees['ville'].'</td>';
					echo '<td><img src="img/boutique/boutique_'.$donnees['image'].'.jpg"/></td>';
					echo '</tr>';
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

