<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

/*	function initialiseTour(){
		$xmlTour=simplexml_load_file('php/tour.xml');
		$u=$xmlTour->addchild("tour",0);
		if (!$xmlTour->asXML('php/tour.xml')) {
			echo "impossible de sauvegarder";
		}
	}*/
	function reinitialiseTour(){
		$xmlTour=simplexml_load_file('php/tour.xml');
		if($xmlTour->tour==null){
			$u=$xmlTour->addchild("tour",0);
		}
		$xmlTour->tour=0;
		$xmlTour->action="";
		if (!$xmlTour->asXML('php/tour.xml')) {
			echo "impossible de sauvegarder";
		}
	}
	function tourSuivant($nbJoueurs){
		$xmlTour=simplexml_load_file('php/tour.xml');
		if($xmlTour->tour==$nbJoueurs-1){
			$xmlTour->tour=0;
		}
		else{$xmlTour->tour=intval($xmlTour->tour)+1;}
		if (!$xmlTour->asXML('php/tour.xml')) {
			echo "impossible de sauvegarder";
		}
	}
	function donneTourActuel(){
		$xmlTour=simplexml_load_file('php/tour.xml');
		return intval($xmlTour->tour);
	}
	function action($act){
		$xmlTour=simplexml_load_file('php/tour.xml');
		$xmlTour->action=$act;
		if (!$xmlTour->asXML('php/tour.xml')) {
			echo "impossible de sauvegarder";
		}
	}
	function afficheAction(){
		$xmlTour=simplexml_load_file('php/tour.xml');
		echo $xmlTour->action;
	}
	function donneTourPrecedent($nbJoueurs){
		$xmlTour=simplexml_load_file('php/tour.xml');
		if(intval($xmlTour->tour)==0){
			return intval($nbJoueurs-1);
		}
		else{return intval($xmlTour->tour-1);}
	}
	function donnePseudoJActuel($xml){
		foreach ($xml->joueur as $j) {
			if(intval($j->pseudo["ordre"])==donneTourActuel()){
				return $j->pseudo;
			}
		}
	}
	function compteDes($xml,$d){
		$cpt=0;
		foreach ($xml->joueur as $j) {
			for ($i=0; $i < $j->nbrDes ; $i++) { 
				if($d==intval($j->nbrDes['de'.$i]) || intval($j->nbrDes['de'.$i])==1){
					$cpt+=1;
				}
			}
		}
		return $cpt;
	}
	function compteAllDes($xml){
		$c=0;
		foreach ($xml->joueur as $j) {
			$c+=$j->nbrDes;
		}
		return $c;
	}
	function enchere($xml,$val,$nbr){
		$xmlEnchere=simplexml_load_file("php/enchere.xml");
		$xmlEnchere->derniereEnchere->d=$val;
		$xmlEnchere->derniereEnchere->nbr=$nbr;
		if(!$xmlEnchere->asXML('php/enchere.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function isMenteur($xml,$nbJoueurs){
		$tourActu=donneTourActuel();
		$tourPrec=donneTourPrecedent($nbJoueurs);
		$xmlEnchere=simplexml_load_file("php/enchere.xml");
		$de=$xmlEnchere->derniereEnchere->d;
		$dernierEnch=intval($xmlEnchere->derniereEnchere->nbr);
		$enchMax=compteDes($xml,$de);
		foreach ($xml->joueur as $j) {
			if (intval($j->pseudo["ordre"])==$tourPrec){
				if(intval($enchMax)<$dernierEnch){
					$j->menteur=1;
					if(!$xml->asXML('php/joueur_xml.xml')){
						echo "impossible de sauvegarder le fichier";
					}
					return true;
				}
			}
			if (intval($j->pseudo["ordre"])==$tourActu){
				if(intval($enchMax)>=$dernierEnch){
					$j->menteur=1;
					if(!$xml->asXML('php/joueur_xml.xml')){
						echo "impossible de sauvegarder le fichier";
					}
					return false;
				}
			}
		}
	}

	function isSpectateur($xml){
		foreach ($xml->joueur as $j) {
			if(intval($j->nbrDes)<=0){
				$j->spectateur=1;
			}
		}
		if(!$xml->asXML('php/joueur_xml.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function nbJoueurActif($xml,$nbJoueurs){
		isSpectateur($xml);
		$cpt=$nbJoueurs;
		foreach ($xml->joueur as $j) {
			if($j->spectateur==1){
				$cpt-=1;
			}
		}
		return $cpt;
	}
	function enleverDesMenteur($xml){
		foreach ($xml->joueur as $j) {
			if(intval($j->menteur)!=1){}
			else{
				$j->nbrDes=intval($j->nbrDes)-1;				
				$j->menteur=0;
			}
		}
	}
	function finJeu(){
		$docJoueur = new DOMDocument();
		$docJoueur -> load('php/joueur_xml.xml');
		$jeux = $docJoueur->documentElement;
		$j = $jeux->getElementsByTagName("Identification");
		while ($jeux->hasChildNodes()) {
			$jeux->removeChild($jeux->firstChild);
		}
		$docJoueur->save("php/joueur_xml.xml");
	}
?>