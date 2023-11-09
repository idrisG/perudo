<?php
	require_once('./php/des.php');
	require_once('./php/algoJeu.php');
	require_once('./php/joueurs.php');
	require_once('./php/enchere.php');
	$xml=simplexml_load_file("./php/joueur_xml.xml");	
	$nbJoueurs=compterJoueur($xml);
	$nbrDes=compteAllDes($xml);
	isSpectateur();
	afficherDesLance($xml);
	foreach ($xml->joueur as $j) {
		if(donneTourActuel()==intval($j->pseudo["ordre"]) && $_SERVER["REMOTE_ADDR"]==$j){
			encherePossible($nbrDes);
			if(isset($_GET["dudo"])){
				if($_GET["dudo"]==1){
					isMenteur($xml,$nbJoueurs);
					enleverDesMenteur($xml);
					reinitialiseEnchere($xml);
					lancerDes($xml);
				}
			}
			if (isset($_GET["val"]) && isset($_GET["nbr"])) {
				enchere($xml,$nbJoueurs,$_GET["val"],$_GET["nbr"]);
			}
		}
	}
?>
