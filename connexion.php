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
					Login :<input type="text" id="txtLogin" name="txtLogin" requiered="required"/>
					Mot De Passe :<input type="text" id="txtpwd" name="txtpwd" requiered="required"/>
					<input  id="effacer" name="effacer" type="reset"  value="Effacer"/><input id="valider" name="valider" type="submit"" value="Connexion"/>
				</fieldset>
			</form>
			
			<?php 
				if(isset($_POST['valider'])&& isset($_POST['txtLogin'])&& isset($_POST['txtpwd'])){
					
					$login=$_POST['txtLogin'];
					$pass=$_POST['txtpwd'];

					try {
							$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
							$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
							$reponseReq = $bdd->prepare('SELECT * FROM user WHERE loginUser = :login');
							$reponseReq->execute(array(
									'login'=>$login
									
							));
							$donnees = $reponseReq->fetch();
							if($pass==$donnees['pwdUser']){
								header('location: admin.php');
							}
							else{
								echo'erreur';
							}
					}
					catch (Exception $erreur){
						die('Il y a une erreur dans la bdd');

					}
				}
			?>
			
		</div>
	</body>
</html>
			











