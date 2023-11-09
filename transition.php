<?php
	header("location: identification.php")
	require_once("php/algoJeu.php");
	require_once("php/enchere.php");
	reinitialiseEnchere();
	reinitialiseTour();
	finJeu();
?>