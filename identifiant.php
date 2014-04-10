<?php
try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.'localhost'.';dbname='.'lafleur_vitrine','root');
	$reponseReq = $bdd->query('SELECT * FROM identifiant');
	echo '<table class="compo">';

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