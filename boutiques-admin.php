<?php session_start()
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/produit-admin.css" />
		<title>Boutique-admin</title>
	</head>
	<body>
		
	<?php if(isset($_SESSION['txtLogin'])){?>
		
			<div class="site">
					<header>
						<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
					
					</header>
					<nav>
						<a href="admin.php">Accueil </a>
						<a href="produit-admin.php">Nos Produits</a>
						<a href="boutiques-admin.php">Nos Boutiques</a>
						<a href="index.php">Deconnexion</a>
					</nav>
					<?php 
						try {
							$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
							$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
							$reponseReq = $bdd->query('SELECT * FROM boutiques ');
							echo '<table class="boutiques">';
							echo '<tr><th>Nom</th><th>Rue</th><th>CP</th><th>Ville</th><th>Boutiques</th><th>ACTION</th>';
						
							while ( $donnees = $reponseReq->fetch() ){
								echo '<tr>';
								//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
								echo '<td>'.$donnees['nom'].'</td>';
								echo '<td>'.$donnees['rue'].'</td>';
								echo '<td>'.$donnees['cp'].'</td>';
								echo '<td>'.$donnees['ville'].'</td>';
								echo'<td class="boutique"><img src="img/boutique/boutique_'.$donnees['image'].'"/></td>';
								echo'<td>
													<form id="modif" method="get" action="modif.php" class="action">
														<input type="submit"  id="modif" name="modifBoutique" value="Modifier"/>
														<input type="hidden"  id="modif" name="chBoutique" value="'.$donnees['id'].'"/>
														
													</form>
													<form id="suppr" method="get" action="suppr.php"class="action">
														<input type="submit"  id="suppr" name="supprimerBoutique" value="Supprimer"/>
														<input type="hidden" id="suppr" name="suppBoutique" value="'.$donnees['id'].'"/>
														
													</form>';
								echo'</tr>';
									
							}
							echo '</table>';
						}
						catch (Exception $erreur) {
							die('Il y a une erreur avec la BDD : '.$erreur->getMessage());
						}
					
						echo'<form id="formajout" name="formajout" method="get" action="boutiques-admin.php">
								<fieldset>
												Ajout de produits :<br/>
												Nom:<input type="text" id="addNomStore" name="addNomStore"/>
												Rue:<input type="text" id="addRue" name="addRue"/>
												Code postal:<input type="text" id="addCp" name="addCp"/>
												Ville:<select name="addVille" id="addVille">
																<option value="Valence">Valence</option>
																<option value="Grenoble">Grenoble</option>
																<option value="Lyon">Lyon</option>
																<option value="Chambery>Chambery</option>
																<option value="Albertville>Albertville</option>
																<option value="Annecy">Annecy</option>
								
															</select>
												<input type="reset" name="reset" id="reset" value="Effacer"/><input type="submit" name="valider" id="valider" value="valider"/>
									</fieldset>
							</form>';
						if(isset($_GET['addNomStore'])&&isset($_GET['addRue'])&& isset($_GET['addCp'])&& isset($_GET['addVille'])){
						
							$addNomstore=$_GET['addNomStore'];
							$addRue=$_GET['addRue'];
							$addCp=$_GET['addCp'];
							$addVille=$_GET['addVille'];
							try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$reponseReq = $bdd->prepare('INSERT INTO boutiques (nom,rue,cp,ville) VALUES(:nom,:rue,:cp,:ville)');
								$reponseReq->execute(array(
										'nom'=>$addNomstore,
										'rue'=>$addRue,
										'cp'=>$addCp,
										'ville'=>$addVille
											
								));
								echo'<h4>La boutique'.$addNomstore.'à été ajouter</h4>';
									
									
						
									
						
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