<?php
	$xml=simplexml_load_file("php/joueur_xml.xml");
	isSpectateur();
	$nbJoueurs=compterJoueur($xml);
	afficherDes($xml);
	if($nbJoueurs>=2){
	  echo '<form class="form-horizontal" method="post" action="tirage.php">';
	  echo '<button type="submit" class="btn btn-primary btn-lg" >Lancer partie</button>';
	  echo '</form>';
	}
?>