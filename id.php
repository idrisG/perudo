<?php
require_once("./php/joueurs.php");
$xml=simplexml_load_file("./php/joueur_xml.xml");
afficherJoueurs($xml);
?>