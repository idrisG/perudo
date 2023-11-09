<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Pret ?</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
  <link type="text/css" rel="stylesheet" href="css/joueur.css"/>
</head>
<body onload='des()'>
<div class="container">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
function autoRefresh_div(){ $(".des").load("pe.php");} setInterval('autoRefresh_div()', 1000);
</script>
<?php
require_once("php/joueurs.php");
require_once("php/algoJeu.php");
if(!addJoueurs()){
  echo '<div class="row">';
  echo '<div id="notification" class="col-md-offset-3 col-md-6 alert alert-dismissible alert-danger text-center has-error">ce pseudo est deja utilise</div>';
  echo '</div>';
	echo '<form class="form-horizontal" method="post" action="perudo.php">';
	$xml=simplexml_load_file("php/joueur_xml.xml");
  echo "<div class=liste_joueurs";
	afficherJoueurs($xml);
  echo "</div>";
	echo '<div class="form-group">';
  echo    '<label for="pseudo" class="col-lg-3 control-label">choisir un nouveau pseudo</label>';
  echo    '<div class="col-lg-9">';
  echo      '<input type="text" class="form-control" name="pseudo" id="pseudo">';
  echo    '</div>';
  echo  '</div>';
  echo '<div class="form-group">';
  echo    '<div class="pull-right">';
  echo      '<button type="submit" class="btn btn-primary btn-lg">jouer</button>';
  echo      '<button type="reset" class="btn btn-default btn-lg">Annuler</button>';
  echo    '</div>';
  echo  '</div>';
}
else{
  echo "<div class='liste_joueurs'>";
  echo "</div>";  
  echo "<div class='des'>";
  echo "</div>";
  $xml=simplexml_load_file("php/joueur_xml.xml");  
}
isSpectateur($xml);
$nbJoueurs=compterJoueur($xml);
?>
</div>
<script src="js/graphisme.js"></script>
</body>
</html>