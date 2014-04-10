<!DOCTYPE html>
	<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit-admin.css" />
		<title>Produit-admin</title>
	</head>
	<body>
		<div class="site">
			<header>
				<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
			
			</header>
			<nav>
				<a href="Page-acceuil.html">Accueil</a>
				<a href="produit.php">Nos Produits</a>
				<a href="boutiques.php">Nos Boutiques</a>
				<a href="connexion.php">Connexion</a>
			</nav>
			<form id="auto" name="forAuto" method="post" action="admin.php">
			<fieldset>
				Login<input type="texte" id="txtLogin" name="txtLogin" requiered=""/>
				Mot De Passe<input type="password" id="pwd" name="pwd" requiered=""/>
				<input  id="effacer" name="effacer" type="reset"  value="Effacer"/><input id="valider" name="valider" type="submit"" value="Valider"/>
			</fieldset>
			</form>
			
			<?php 
			
			
			?>
			
		</div>
	</body>
</html>
			











