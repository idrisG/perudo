<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Perudo</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/styleMenu.css"/> 
	<script type="text/javascript" src="js/menu.js"></script>
	<link type="text/css" rel="stylesheet" href="css/joueur.css"/>
</head>
<body background="image/rio.jpg">
<div class="container">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
function autoRefresh_div(){ $("#Jeu").load("./LP.php");} setInterval('autoRefresh_div()', 3500);
</script>
<!--<button class="btn btn-primary btn-lg" onclick="postE();">Enchere</button>-->
<div id="Jeu">
</div>
<script type="text/javascript" src="oXHR.js"></script>
<script type="text/javascript" src="js/jeu.js"></script>
</body>
</html>
