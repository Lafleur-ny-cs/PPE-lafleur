<?php session_start()
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit-admin.css" />
		<title>modif</title>
	</head>
	<body background="prairie2.css" style="background-repeat:no-repeat;">
		<?php if(isset($_SESSION['txtLogin'])){?>		
				
				
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
											echo'<td class="boutique"><img src="img/'.$categorie.'/'.$donnees['image'].'"/></td>';
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
						if(isset($_GET['modifBoutique'])&& isset($_GET['chBoutique'])){
							$idstore=$_GET['chBoutique'];
							
							
							try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$reponseReq = $bdd->prepare('SELECT * FROM boutiques WHERE id= :id ');
								$reponseReq->execute(array(
										'id'=>$idstore
								));
								echo '<table class="boutiques">';
								echo '<tr><th>Nom</th><th>Rue</th><th>CP</th><th>Ville</th><th>Boutiques</th>';
							
								while ( $donnees = $reponseReq->fetch() ){
									echo '<tr>';
									//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
									echo '<td>'.$donnees['nom'].'</td>';
									echo '<td>'.$donnees['rue'].'</td>';
									echo '<td>'.$donnees['cp'].'</td>';
									echo '<td>'.$donnees['ville'].'</td>';
									echo'<td><img src="img/boutique/boutique_'.$donnees['image'].'"/></td>';
									echo'</tr>';
										
							
									echo '</table>';
									echo'	<form id="modifierVille" name="modifierVille" method="post" action="modif.php">
														<fieldset>
															Modifications :<br/>
															Nom : <input id="NewtxtNom" name="NewtxtNom" type="text" value="'. $donnees['nom'].'"/><br/>
															Rue :<input id="NewtxtRue" name="NewtxtRue" type="text" value="'.$donnees['rue'].'"/><br/>
															Code-postal :<input id="NewtxtCp" name="NewtxtCp" type="text" value="'.$donnees['cp'].'"/><br/>
															Ville:<select name="NewVille" id="NewVille">
																	<option value="Valence">Valence</option>
																	<option value="Grenoble">Grenoble</option>
																	<option value="Lyon">Lyon</option>
																	<option value="Chambery>Chambery</option>
																	<option value="Albertville>Albertville</option>
																	<option value="Annecy">Annecy</option>
																</select>
															<input type="hidden"  id="modif" name="id" value="'.$donnees['id'].'"/>
															<input id="reset" name="reset" type="reset" value="Effacer"/><input id="valider" name="valider" type="submit" value="Valider"/>
														</fieldset>
													</form>';
								}
							}
							catch (Exception $erreur) {
								die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
							}
							
							
						}
						if(isset($_POST['NewtxtNom'])&& isset($_POST['NewtxtRue'])&& isset($_POST['NewtxtCp'])&& isset($_POST['NewVille'])){
		
							$nomStore=$_POST['NewtxtNom'];
							$rueVille=$_POST['NewtxtRue'];
							$cpVille=$_POST['NewtxtCp'];
							$nomVille=$_POST['NewVille'];
							$idstore=$_POST['id'];
							
							try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$ajoutReq = $bdd->prepare('UPDATE boutiques SET nom = :nom, rue = :rue, cp = :cp ,ville=:ville WHERE id = :id');
								$ajoutReq->execute(array(
										'nom' => $nomStore,
										'rue' => $rueVille,
										'cp' => $cpVille,
										'ville'=>$nomVille,
										'id' =>$idstore
							
								));
							
								echo '<h4>Votre boutiques a bien été modifier </h4>';
							}
							catch (Exception $erreur) {
								die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
							}
							
							
		
						}
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
