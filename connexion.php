<?php session_start()
?>

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
				<a href="index.php">Accueil</a>
				<a href="produit.php">Nos Produits</a>
				<a href="boutiques.php">Nos Boutiques</a>
				<a href="connexion.php">Connexion</a>
			</nav>
			<form id="auto" name="forAuto" method="get" action="connexion.php">
				<fieldset>
					Login :<input type="text" id="txtLogin" name="txtLogin" required="required"/>
					Mot De Passe :<input type="text" id="txtpwd" name="txtpwd" required="required"/>
					<input  id="effacer" name="effacer" type="reset"  value="Effacer"/><input id="valider" name="valider" type="submit"" value="Connexion"/>
				</fieldset>
			</form>
			
			<?php 
				if(isset($_GET['valider'])&& isset($_GET['txtLogin'])&& isset($_GET['txtpwd'])){
					
					$login=$_GET['txtLogin'];
					$pass=$_GET['txtpwd'];
					//$statut= $_GET['statutUser'];

					try {
							$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
							$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
							$reponseReq = $bdd->prepare('SELECT * FROM users WHERE loginUser = :login AND pwdUser = :pwd');
							$reponseReq->execute(array(
									'login'=>$login,
									'pwd' => $pass
									
							));
							
							//echo $login.$pass;
							$nb = $reponseReq->rowCount();
							//echo $nb ;
							if($nb >=1){
								$donnees = $reponseReq->fetch();
								$_SESSION['txtLogin']=$login;
								$_SESSION['statutUser']=$donnees['statutUser'];
								header('location: admin.php');
								
							}
							else{
								echo'Login ou mot de passe incorect';
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
			











