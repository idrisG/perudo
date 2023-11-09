<?php
	require_once('./php/des.php');
	require_once('./php/algoJeu.php');
	require_once('./php/joueurs.php');
	$xml=simplexml_load_file("php/joueur_xml.xml");	
	$nbJoueurs=compterJoueur($xml);
	if(!isset($_GET["dudo"])){
		echo "oops";
	}
	else{
		echo "ça marche champion";
		isMenteur($xml);
		enleverDesMenteur($xml);
	}
?>