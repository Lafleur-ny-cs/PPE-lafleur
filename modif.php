<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit.css" />
		<title>modif</title>
	</head>
	<body background="prairie2.css" style="background-repeat:no-repeat;">
		<div class="site">
			<header>
				<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
			
			</header>
		<hr/>
		<?php

				if(isset($_GET['modif'])&& isset($_GET['changer'])){
						$id = $_GET['changer'];
						$categorie = $_GET['modifer'];
						
						
					
						try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$reponseReq = $bdd->prepare('SELECT * FROM produits WHERE categorie = :categorie AND produit_id= :id ');
								$reponseReq->execute(array(
										'categorie'=>$categorie,
										'id'=>$id
								));
								echo '<table class="fleur">';
								echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Fleurs</th>';
						
								while ( $donnees = $reponseReq->fetch() ){
									echo '<tr>';
									//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
									echo '<td>'.$donnees['nom'].'</td>';
									echo '<td>'.$donnees['sous_titre'].'</td>';
									echo '<td>'.$donnees['prix'].'</td>';
									echo'<td><img src="img/'.$categorie.'/'.$donnees['image'].'"/></td>';
									echo'</tr>';
									
								
									echo '</table>';
									echo'	<form id="modifier" name="modifier" method="post" action="modif.php">
												<fieldset>
													Modifications :<br/>
													Nom : <input id="txtNom" name="txtNom" type="text" value="'. $donnees['nom'].'"/><br/>
													Sous-titre :<input id="txtSoustitre" name="txtSoustitre" type="text" value="'.$donnees['sous_titre'].'"/><br/>
													Prix :<input id="txtPrix" name="txtPrix" type="text" value="'.$donnees['prix'].'"/><br/>
													<input type="hidden"  id="modif" name="produit_id" value="'.$donnees['produit_id'].'"/>
													<input id="reset" name="reset" type="reset" value="Effacer"/><input id="valider" name="valider" type="submit" value="Valider"/>
												</fieldset>
											</form>';
								}
						}
						catch (Exception $erreur) {
							die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
						}
							
				}
				if(isset($_POST['txtNom'])&& isset($_POST['txtSoustitre'])&& isset($_POST["txtPrix"])&& isset($_POST["produit_id"])){
					echo '<h4>le produit va etre modifié </h4>';
					$newNom = $_POST['txtNom'];
					$newStitre = $_POST['txtSoustitre'];
					$newPrix = $_POST["txtPrix"];
					$idprod = $_POST["produit_id"];
					
					try {
						$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
						$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
						$ajoutReq = $bdd->prepare('UPDATE produits SET nom = :nom, sous_titre = :sous_titre, prix = :prix WHERE produit_id = :id');
						$ajoutReq->execute(array(
								'nom' => $newNom,
								'sous_titre' => $newStitre,
								'prix' => $newPrix,
								'id' =>$idprod
				
						));
				
						echo '<h4>Votre produit a bien été modifier </h4>';
					}
					catch (Exception $erreur) {
						die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
					}
				
				}
		?>
			
			
			
			
			
			
			
		
		</div>

	</body>
</html>
