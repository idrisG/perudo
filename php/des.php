<?php
	function lancerDes($xml){
		foreach ($xml->joueur as $j) {
			for ($i=0; $i < $j->nbrDes ; $i++) {
				$j->nbrDes["de".$i]=rand(1,6);
			}		
		}
		if(!$xml->asXML("php/joueur_xml.xml")){
			echo "impossible de sauvegarder";
		}
	}
	function afficherDes($xml){
		foreach ($xml->joueur as $j) {
			if ($j==$_SERVER['REMOTE_ADDR'] && $j->spectateur!=1) {
				echo "les des de : ".$j->pseudo;
				echo '<div class="desJoueur">';
				for ($i=1; $i <= $j->nbrDes ; $i++) {
					echo '<img src="image/'.$i.'.png" id="d'.$i.'"/>';
				}
				echo '</div>';
			}
		}
	}
	function afficherDesLance($xml){
		foreach ($xml->joueur as $j) {
			if ($j==$_SERVER['REMOTE_ADDR']) {
				if ($j->spectateur==1) {
					foreach ($xml->joueur as $k) {
						if ($k->spectateur!=1) {
							echo "<div class='action'>";
							echo "les Des de : ".$k->pseudo;
							echo "</div>";
							echo '<div class="desJoueur">';
							for ($i=0; $i < $k->nbrDes ; $i++) {
								echo '<img src="image/'.$k->nbrDes["de".$i].'.png" id="d'.$i.'"/>';
							}
							echo '</div>';
						}
					}
				}
				else{
					for ($i=0; $i < $j->nbrDes ; $i++) { 
						echo '<img src="image/'.$j->nbrDes["de".$i].'.png" id="d'.$i.'"/>';
					}
				}
			}
		}
	}
?>