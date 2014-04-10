
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" media="screen" href="css/produit.css" />
<title>Fleurs-admin</title>
</head>
<body background="prairie2.css" style="background-repeat:no-repeat;">
<div class="site">
<header>
<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
	
</header>
<nav>
<a href="Page-acceuil.html">Accueil</a>
<a href="fleur.php">Nos Fleurs</a>
<a href="compo.php">Nos Compositions</a>
<a href="plante.php">Nos Plantes</a>
<a href="boutiques.php">Nos Boutiques</a>
	
	
	
	</form>
</nav>
<?php
if(isset($_GET['supprimer'])){
	$id=$_GET['suppri'];
	$categorie=$_GET['effacer'];

	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
		$reponseReq = $bdd->prepare('SELECT * FROM produits WHERE categorie=:categorie AND produit_id=:id' );
		$reponseReq->execute(array(
				'categorie'=>$categorie,
				'id'=>$id
				
				
				));
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
						<input id="suppr" name="b1" type="submit" value="Oui" /><input name="b2" type="submit" value="Non"/>
						<input id="suppr" name="suppr" type="hidden" value="'.$donnees['produit_id'].'"/>
					</fieldset>
				</form>';
	
				
		}
		
	}
	catch (Exception $erreur) {
		die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
	}
}
if ( isset($_GET['b1'])  ) {
	$suppFl = $_GET['suppr'];
	echo $suppFl;
	try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
		$modification = $bdd->prepare('DELETE FROM produits WHERE produit_id =:fleurs');
		$modification->execute(array(
				'fleurs' => $suppFl
		));
		$modification->closeCursor();
		echo '<h1 class="goood">La fleur '.$suppFl.' a �t� supprim�.</h4>';
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}
if(isset($_GET['b2'])){
	header('location: fleur-admin.php');
}







?>
</div>

</body>
</html>