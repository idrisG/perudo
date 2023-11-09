<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Perudo</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/joueur.css"/>
</head>
<body>
<div class="container">
<?php
	require_once('./php/joueurs.php');
	$xml=simplexml_load_file("./php/joueur_xml.xml");
	echo "le gagnant est : ".afficheGagnant($xml);
?>
<form class="form-horizontal" action="transition.php">
	<button type="submit" class="btn btn-primary btn-lg">Relancer Partie</button>
</form>
</div>
</body>
</html>