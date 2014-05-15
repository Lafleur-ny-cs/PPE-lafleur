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
			
		<?php if(isset($_SESSION['txtLogin'])){?>	
			
			<div class="site">
				<header>
					<img src="img/lafleur.gif" class="logo"><br/><br/>Dites le avec des fleurs
				
				</header>
				<nav>
					<a href="admin.php">Accueil</a>
					<a href="produit-admin.php">Nos Produits</a>
					<a href="boutiques-admin.php">Nos Boutiques</a>
					<a href="index.php">Deconnexion</a>
				</nav>
					<form id="formChoix" method="post" action="produit-admin.php">
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
									echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Fleurs</th><th>Action</th></tr>';
							
									while ( $donnees = $reponseReq->fetch() ){
										echo '<tr>';
										//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
										echo '<td>'.$donnees['nom'].'</td>';
										echo '<td>'.$donnees['sous_titre'].'</td>';
										echo '<td>'.$donnees['prix'].'</td>';
										echo'<td><img src="img/fleurs/'.$donnees['image'].'"/></td>';
										echo'<td>
												<form id="modif" method="get" action="modif.php" class="action">
													<input type="submit"  id="modif" name="modif" value="Modifier"/>
													<input type="hidden"  id="modif" name="changer" value="'.$donnees['produit_id'].'"/>
													<input type="hidden" id="modif" name="modifer" value="fleurs"/>
												</form>
												<form id="suppr" method="get" action="suppr.php"class="action">
													<input type="submit"  id="suppr" name="supprimer" value="Supprimer"/>
													<input type="hidden" id="suppr" name="suppri" value="'.$donnees['produit_id'].'"/>
													<input type="hidden" id="modif" name="effacer" value="fleurs"/>
												</form>';
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
										echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Compositions</th><th>Action</th></tr>';
										while ( $donnees = $reponseReq->fetch() ){
											echo '<tr>';
											//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
											echo '<td>'.$donnees['nom'].'</td>';
											echo '<td>'.$donnees['sous_titre'].'</td>';
											echo '<td>'.$donnees['prix'].'</td>';
											echo'<td><img src="img/compo/'.$donnees['image'].'"/></td>';
											echo'<td>
													<form id="modif" method="get" action="modif.php" class="action">
														<input type="submit"  id="modif" name="modif" value="Modifier"/>
														<input type="hidden"  id="modif" name="changer" value="'.$donnees['produit_id'].'"/>
														<input type="hidden" id="modif" name="modifer" value="compo"/>
													</form>
													<form id="suppr" method="get" action="suppr.php" class="action">
														<input type="submit"  id="suppr" name="supprimer" value="Supprimer"/>
														<input type="hidden" id="suppr" name="suppri" value="'.$donnees['produit_id'].'"/>
														<input type="hidden" id="modif" name="effacer" value="compo"/>
													</form>';
											echo'</tr>';
											
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
										echo '<tr><th>Nom</th><th>Sous-titre</th><th>Prix</th><th>Plantes</th><th>Action</th></tr>';
											
										while ( $donnees = $reponseReq->fetch() ){
											echo '<tr>';
											//echo '<td><a href="produit"'.$donnees['image'].'"/></a></td>';
											echo '<td>'.$donnees['nom'].'</td>';
											echo '<td>'.$donnees['sous_titre'].'</td>';
											echo '<td>'.$donnees['prix'].'</td>';
											echo'<td><img src="img/plantes/'.$donnees['image'].'"/></td>';
											echo'<td>
													<form id="modif" method="get" action="modif.php" class="action">
														<input type="submit"  id="modif" name="modif" value="Modifier"/>
														<input type="hidden"  id="modif" name="changer" value="'.$donnees['produit_id'].'"/>
														<input type="hidden" id="modif" name="modifer" value="plantes"/>
													</form>
													<form id="suppr" method="get" action="suppr.php" class="action">
														<input type="submit"  id="suppr" name="supprimer" value="Supprimer"/>
														<input type="hidden" id="suppr" name="suppri" value="'.$donnees['produit_id'].'"/>
														<input type="hidden" id="modif" name="effacer" value="plantes"/>
													</form>';
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
						echo'<form id="formajout" name="formajout" method="get" action="produit-admin.php">
								<fieldset>
												Ajout de produits :<br/>
												Nom:<input type="text" id="addNom" name="addNom"/>
												Sous-titre:<input type="text" id="addSTitre" name="addSTitre"/>
												Prix:<input type="text" id="addPrix" name="addPrix"/>
												Catégorie:<select name="addCategorie" id="addCategorie">
																<option value="fleurs">Fleurs</option>
																<option value="compo">Compositions</option>
																<option value="plantes">Plantes</option>
														
															</select>
												<input type="reset" name="reset" id="reset" value="Effacer"/><input type="submit" name="valider" id="valider" value="valider"/>
									</fieldset>
							</form>';
						if(isset($_GET['addNom'])&&isset($_GET['addSTitre'])&& isset($_GET['addPrix'])&& isset($_GET['addCategorie'])){
							
							$addNom=$_GET['addNom'];
							$addSTitre=$_GET['addSTitre'];
							$addPrix=$_GET['addPrix'];
							$addCategorie=$_GET['addCategorie'];
							try {
								$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
								$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
								$reponseReq = $bdd->prepare('INSERT INTO produits (nom,sous_titre,prix,categorie) VALUES(:nom,:sous_titre,:prix,:categorie)');
								$reponseReq->execute(array(
										'nom'=>$addNom,
										'sous_titre'=>$addSTitre,
										'prix'=>$addPrix,
										'categorie'=>$addCategorie
										
								));
								echo'<h4>La fleur'.$addNom.'à été ajouter</h4>';
								
										
							
								
									
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
