<?php
	require_once("./php/des.php") ;
	require_once("./php/joueurs.php");
	require_once("./php/algoJeu.php");
	require_once("./php/enchere.php");
	$xml=simplexml_load_file("./php/joueur_xml.xml");
	initialiseEnchere();
	reinitialiseTour();
	$nbJoueurs=compterJoueur($xml);
	lancerDes($xml);
	ordreJoueur($xml,$nbJoueurs);
	header('Location: lancerPerudo.php');
?>