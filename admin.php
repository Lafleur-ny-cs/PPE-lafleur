<?php session_start()
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/acceuil.css" />
		<title>Acceuil</title>
	</head>
	<body background="prairie2.css" style="background-repeat:no-repeat;">
		<?php if(isset($_SESSION['txtLogin'])&& isset($_SESSION['statutUser'])){
				$statut=$_SESSION['statutUser'];
				if($statut=='A'){
					$stat_in="administrateur";
				}
				else{
					$stat_in="utilisateur";
				}
			
			?>	
			
			<div class="site">
				<header>
					<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
				
				</header>
				<nav>
					<a href="admin.php">Accueil</a>
					<a href="produit-admin.php">Nos Produits</a>
					<a href="boutiques.php">Nos Boutiques</a>
					<a href="index.php">Deconnexion</a>
					
				
				</nav>
				<br/>
				<h2>Espace admin</h2>
				</br>
				<?php echo'Bienvenue en espace '.$stat_in.'</br>';
					  echo $_SESSION['txtLogin'];
				
				?>
			
			
			
			</div>
		<?php 
			}
			else{
				echo'Espace resérvé au administrateur';
			}
		
		
		
		?>
	</body>
</html>
