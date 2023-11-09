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
<body background="image/rio.jpg">
<div class="container">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
function autoRefresh_div(){ $(".liste_joueurs").load("id.php");} setInterval('autoRefresh_div()', 1000);
</script>
<br>
<div class="row">
<div class="col-md-6 col-md-offset-3 well">
<form class="form-horizontal" method="post" action="perudo.php">
<fieldset>
<legend>Identification</legend>
<div class="form-group">
  <label for="pseudo" class="col-lg-3 control-label">Pseudo</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" name="pseudo" id="pseudo">
  </div>
</div>
<div class="form-group">
  <div class="pull-right">
    <button type="submit" class="btn btn-primary btn-lg">jouer</button>
    <button type="reset" class="btn btn-default btn-lg">Annuler</button>
  </div>
</div>
</fieldset>
</form>
</div><!-- /well -->
</div> <!-- /row -->
<div class="liste_joueurs">
</div>
</div>
</body>
</html>