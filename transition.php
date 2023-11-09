<?php
	header("location: index.php");
	require_once("php/algoJeu.php");
	require_once("php/enchere.php");
	reinitialiseEnchere();
	reinitialiseTour();
	finJeu();
?>