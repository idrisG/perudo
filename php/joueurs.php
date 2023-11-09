<?php
	function addJoueurs(){
		if(isset($_POST["pseudo"])){
			$pseudo = $_POST["pseudo"];
			if($pseudo!=""){
				$xml=simplexml_load_file('php/joueur_xml.xml');
				$nbJoueurs=0;
				foreach ($xml->joueur as $j) {
					$nbJoueurs=$nbJoueurs+1;
					if ($j->pseudo==$pseudo) {
						return false;
					}
					if ($j==$_SERVER['REMOTE_ADDR']) {
						return true;
					}
				}
				$u=$xml->addChild('joueur',$_SERVER['REMOTE_ADDR']);
				$u->addChild("pseudo",$pseudo);
				$u->pseudo["ordre"]=$nbJoueurs;
				$u->addChild("nbrDes",5);
				$u->addChild("spectateur",0);
				$u->addChild("menteur",0);
				if(!$xml->asXML('./php/joueur_xml.xml')){
					echo "impossible de sauvegarder le fichier";
				}
				$xml->saveXML('./php/joueur_xml.xml');
				return true;
			}
		}
	}
	function afficherJoueurs($xml){
		echo "<p>Joueurs Connectes : </p>";
		echo'<ol>';
		foreach ($xml->joueur as $j) {
			if ($j->nbrDes=="") {$j->nbrDes=0;}
			echo '<li id="'.$j->pseudo['ordre'].'">'.$j->pseudo.' : '.$j->nbrDes.' des </li>';			
		}
		echo '</ol>';
		if(!$xml->asXML('./php/joueur_xml.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function afficherJoueursPartiLancee($xml){
		echo'<ol>';
		foreach ($xml->joueur as $j) {
			if ($j->nbrDes=="") {$j->nbrDes=0;}
			echo '<li id="'.$j->pseudo['ordre'].'">'.$j->pseudo.' : '.$j->nbrDes.' des </li>';			
		}
		echo '</ol>';
		if(!$xml->asXML('./php/joueur_xml.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function compterJoueur($xml){
		$compteur=0;
		foreach ($xml->joueur as $j) {
			$compteur=$compteur+1;
		}
		return $compteur;
	}
	function ordreJoueur($xml,$nbJoueurs){
		$temp = array('pseudo' => "" , "desLancement" => 0);
		$tempPremier=0;
		foreach ($xml->joueur as $j) {
			if ($j->spectateur!=1) {
				$desLancement=rand(1,6);
				if ($desLancement>$temp["desLancement"]) {
					$tempPremier=0;
					$temp["pseudo"]=$j->pseudo;
					$temp["desLancement"]=$desLancement;
					$tempPremier+=$j->pseudo["ordre"];
				}
			}
		}
		ordreDebutJeu($xml);
		foreach ($xml->joueur as $j) {
			if($j->spectateur!=1){
				if($j->pseudo["ordre"]-$tempPremier<0){
					$j->pseudo["ordre"]+=$nbJoueurs;
					$j->pseudo["ordre"]-=$tempPremier;
				}
				else{$j->pseudo["ordre"]-=$tempPremier;}
			}
		}
		if(!$xml->asXML("./php/joueur_xml.xml")){
			echo "impossible de sauvegarder";
		}
	}
	function ordreDebutJeu($xml){
		$i=0;
		foreach ($xml->joueur as $j) {
			$j->pseudo["ordre"]=$i;
			$i++;
		}
		if(!$xml->asXML('./php/joueur_xml.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function afficheGagnant($xml){
		foreach ($xml->joueur as $j) {
			if($j->spectateur!=1){
				return $j->pseudo;
			}
		}
	}
?>