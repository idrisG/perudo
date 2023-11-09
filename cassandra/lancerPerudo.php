<?php
	require_once('php/base.php');
	require_once('php/algoJeu.php');
	require_once('php/joueurs.php');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo "<!DOCTYPE html>\n";
	echo "<html lang=\"fr\">\n";
	echo "<head>\n";
	echo "	<title>Perudo</title>\n";
	echo "	<meta charset=\"utf-8\">\n";
	echo "	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
	echo "	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
	echo "	<link type=\"text/css\" rel=\"stylesheet\" href=\"css/bootstrap.min.css\"/>\n";
	echo "</head>\n";
	echo '<body background="image/rio.jpg">';
	echo "<div class=\"container\">\n";
	echo '<button type="submit" class="btn btn-primary btn-lg">Dudo</button>';
	echo '<button type="submit" class="btn btn-primary btn-lg" onclick="return actualisePseudo($joueur_actuel)">Changer joueur</button>';
	echo '<p id="joueur">pseudo</p>';
	echo '<img src="image/1.png"  alt="" class=d1/>'; 
	echo '<img src="image/2.png"  alt="" class=d2/>'; 
	echo '<img src="image/3.png"  alt="" class=d3/>'; 
	echo '<img src="image/4.png"  alt="" class=d4/>'; 
	echo '<img src="image/5.png"  alt="" class=d5/>';  
	echo '</br>';	

	$xml=simplexml_load_file("php/joueur_xml.xml");
	lancerDes($xml);
	$nbJoueurs=compterJoueur($xml);
	// print_r(compterNbreDes($xml));
	echo '</br>';
	echo "le premier joueur est : ";ordreJoueur($xml,$nbJoueurs);
	echo '</br>';

	$joueur_actuel=donneJoueur($xml);
	echo "le joueur actuel est : ";$joueur_actuel;

?>


<script src="js/graphisme.js"></script>
</div>
</body>
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function compterNbreDes($xml){
	//$xml=simplexml_load_file("php/joueur_xml.xml");
	$tabDes=array();
	$k=0;
    foreach ($xml->joueur as $j) {
    	$tab=array();
    	$dess=(string)$j->nbrDes;
        for ($i=0; $i < $j->nbrDes ; $i++) {	
          $tab[$i]=(string)$j->nbrDes["des".$i];
        }
        $tabDes[$k]=$tab;
        $k++;
    }
    return $tabDes;
}

function donneJoueur($xml){
	//$xml=simplexml_load_file("php/joueur_xml.xml");
	foreach ($xml->joueur as $j) {
		$o =$j->pseudo["ordre"];
		if($o==0){
			return (string)$j->pseudo;
		}	
	}
} 


?>
