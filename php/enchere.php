<?php
	function initialiseEnchere(){
		$xml=simplexml_load_file("./php/enchere.xml");
		if ($xml->derniereEnchere==null) {
			$xml->addChild("derniereEnchere",0);
		}
		if ($xml->derniereEnchere->d==null) {
			$xml->derniereEnchere->addChild("d",0);
		}
		else{$xml->derniereEnchere->d=0;}
		if ($xml->derniereEnchere->nbr==null) {
			$xml->derniereEnchere->addChild("nbr",0);
		}
		else{$xml->derniereEnchere->nbr=0;}
		if(!$xml->asXML('./php/enchere.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function reinitialiseEnchere(){
		$xml=simplexml_load_file("./php/enchere.xml");
		$xml->derniereEnchere->d=0;
		$xml->derniereEnchere->nbr=0;
		if(!$xml->asXML('./php/enchere.xml')){
			echo "impossible de sauvegarder le fichier";
		}
	}
	function encherePossible($nbDes){
		$xml=simplexml_load_file("./php/enchere.xml");
		echo "<ul id='menu'>";
		if (intval($xml->derniereEnchere->d==1)) {
			for ($i=1; $i <=6 ; $i++) { 
				if($i==1){
					echo "<li>";
					echo    '<a href="#">nombre de : '.$i.'</a>';
					echo 	"<ul>";
					for ($j=1; $j <= $nbDes ; $j++) {
						if($j>intval($xml->derniereEnchere->nbr)){
				        	echo '<li><a href="#" onclick="enchere(\''.$i.'\', \''.$j.'\')">'.$j.'</a></li>';
				        }
					}
					echo 	"</ul>";
					echo "</li>";
				}
				else if($i>intval($xml->derniereEnchere->d)){
					echo "<li>";
					echo    '<a href="#">nombre de : '.$i.'</a>';
					echo 	"<ul>";
					for ($k=1; $k <= $nbDes ; $k++) {
						if($k>=intval(intval($xml->derniereEnchere->nbr)*2)+1){
				        	echo '<li><a href="#" onclick="enchere(\''.$i.'\', \''.$k.'\')">'.$k.'</a></li>';
				        }
					}
					echo 	"</ul>";
					echo "</li>";
				}
			}
		}
		else{
			for ($i=1; $i <= 6; $i++) {
				if($i==1){
					echo "<li>";
					echo    '<a href="#">nombre de : '.$i.'</a>';
					echo 	"<ul>";
					for ($j=1; $j <= $nbDes ; $j++) {
						if($j>intval(intval($xml->derniereEnchere->nbr)/2)){
				        	echo '<li><a href="#" onclick="enchere(\''.$i.'\', \''.$j.'\')">'.$j.'</a></li>';
				        }
					}
					echo 	"</ul>";
					echo "</li>";
				}
				else if($i==intval($xml->derniereEnchere->d)){
					echo "<li>";
					echo    '<a href="#">nombre de : '.$i.'</a>';
					echo 	"<ul>";
					for ($k=1; $k <= $nbDes ; $k++) {
						if($k>intval($xml->derniereEnchere->nbr)){
				        	echo '<li><a href="#" onclick="enchere(\''.$i.'\', \''.$k.'\')">'.$k.'</a></li>';
				        }
					}
					echo 	"</ul>";
					echo "</li>";
				}
				else if($i>intval($xml->derniereEnchere->d)){
					echo "<li>";
					echo    '<a href="#">nombre de : '.$i.'</a>';
					echo 	"<ul>";
					for ($l=1; $l <= $nbDes ; $l++) {
						if($l>=intval($xml->derniereEnchere->nbr)){
				        	echo '<li><a href="#" onclick="enchere(\''.$i.'\', \''.$l.'\')">'.$l.'</a></li>';
				        }
					}
					echo 	"</ul>";
					echo "</li>";
				}
			}
			echo "</ul>";
		}
	}
?>