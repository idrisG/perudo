<?php
	require_once("php/des.php") ;
	require_once("php/joueurs.php");
	require_once("php/algoJeu.php");
	$xml=simplexml_load_file("php/joueur_xml.xml");
	afficherJoueurs($xml);
	isSpectateur($xml);
	$nbJoueurs=compterJoueur($xml);
	afficherDes($xml);
	if($nbJoueurs>=2){
	  echo '<form class="form-horizontal" method="post" action="tirage.php">';
	  echo '<button type="submit" class="btn btn-primary btn-lg" >Lancer partie</button>';
	  echo '</form>';
	}
?>