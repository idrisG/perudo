<?php
	require_once('php/des.php');
	require_once('php/algoJeu.php');
	require_once('php/joueurs.php');
	require_once('php/enchere.php');
	$xml=simplexml_load_file("php/joueur_xml.xml");	
	$nbJoueurs=compterJoueur($xml);
	$nbrDes=compteAllDes($xml);
	$nbrJoueurActif=nbJoueurActif($xml,$nbJoueurs);
	isSpectateur($xml);
	afficherJoueursPartiLancee($xml);
	afficherDesLance($xml);
	echo '</br>';
	echo "<div id='action'>";
	afficheAction();
	echo '</br>';
	echo "c'est au tour de : ".donnePseudoJActuel($xml);
	echo "</div>";
	echo '</br></br></br>';
	if ($nbrJoueurActif==1) {
		header('Location: partieFinie.php');   
	}
		foreach ($xml->joueur as $j) {
			if(donneTourActuel()==intval($j->pseudo["ordre"])){
				if($_SERVER["REMOTE_ADDR"]==$j && $j->spectateur!=1){
					echo '<button id="dudo" class="btn btn-primary btn-lg" onclick="postD();">Dudo</button>';
					echo "<div id='enchere'>surencherir ?</div>";
					encherePossible($nbrDes);
					if(isset($_GET["dudo"])){
						if($_GET["dudo"]==1){
							if(isMenteur($xml,$nbJoueurs)){
								action(donnePseudoJActuel($xml)." a dis dudo et il ne s'est pas trompe");
							}
							else{action(donnePseudoJActuel($xml)." a dis dudo mais il s'est trompe");}
							enleverDesMenteur($xml);
							reinitialiseEnchere($xml);
							lancerDes($xml);
						}
					}
					if (isset($_GET["val"]) && isset($_GET["nbr"])) {
						$val=$_GET["val"];
						$nbr=$_GET["nbr"];
						action(donnePseudoJActuel($xml)." pense qu'il y a ".$nbr." des de valeur ".$val);
						enchere($xml,$nbJoueurs,$val,$nbr);
						tourSuivant($nbJoueurs);
					}
				}
				if($_SERVER["REMOTE_ADDR"]==$j && $j->spectateur==1){
					tourSuivant($nbJoueurs);
				}
			}
	}
?>
