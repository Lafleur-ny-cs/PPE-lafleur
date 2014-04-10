<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit.css" />
		<title>Nos produits</title>
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
				<form id="formChoix" method="post" action="produit.php">
					<fieldset>
						Nos produits :<br/>
						Nos fleurs <input id="choix" name="choix" type="radio" value="fleur"/><br/>
						Nos compositions <input id="choix" name="choix" type="radio" value="compo"/><br/>
						Nos plantes <input id="choix" name="choix" type="radio" value="plantes"/><br/>
						<input  id="effacer" name="effacer" type="reset"  value="Effacer"/><input id="valider" name="valider" type="submit"" value="Valider"/>
					</fieldset>	
					</form>
				
				<?php 
					
					if(isset($_POST['choix'])){
						$choix = $_POST['choix'];
						switch($choix){
							case $choix == 'fleur' :
							 try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$reponseReq = $bdd->query('SELECT * FROM produits WHERE categorie="fleurs" ');
								echo '<table class="fleur">';
								echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Fleurs</th>';
						
								while ( $donnees = $reponseReq->fetch() ){
									echo '<tr>';
									//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
									echo '<td>'.$donnees['nom'].'</td>';
									echo '<td>'.$donnees['sous_titre'].'</td>';
									echo '<td>'.$donnees['prix'].'</td>';
									echo'<td><img src="img/fleurs/'.$donnees['image'].'"/></td>';
									echo'</tr>';
									
								}
								echo '</table>';
							}
							catch (Exception $erreur) {
								die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
							}
							break;
							case $choix == 'compo' : 
								try {
									$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
									$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
									$reponseReq = $bdd->query('SELECT * FROM produits WHERE categorie="compo"');
									echo '<table class="compo">';
									echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Compositions</th>';
									while ( $donnees = $reponseReq->fetch() ){
										echo '<tr>';
										echo '<td>'.$donnees['nom'].'</td>';
										echo '<td>'.$donnees['sous_titre'].'</td>';
										echo '<td>'.$donnees['prix'].'</td>';
										echo '<td><img src="img/compo/'.$donnees['image'].'"/></td>';
										echo '</tr>';
									}
									echo '</table>';
								}
								catch (Exception $erreur) {
									die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
								}
							break;
							case $choix == 'plantes' :	
								try {
									$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
									$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
									$reponseReq = $bdd->query('SELECT * FROM produits WHERE categorie="plantes" ');
									echo '<table class="plantes">';
									echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Plantes</th>';
										
									while ( $donnees = $reponseReq->fetch() ){
										echo '<tr>';
										//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
										echo '<td>'.$donnees['nom'].'</td>';
										echo '<td>'.$donnees['sous_titre'].'</td>';
										echo '<td>'.$donnees['prix'].'</td>';
										echo'<td><img src="img/plantes/'.$donnees['image'].'"/></td>';
										echo'</tr>';
								
									}
									echo '</table>';
								}
								catch (Exception $erreur) {
									die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
								}
								break;
						}
				
					}
				?>
		</div>
	
	
	
	</body>
</html>
