function postD(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if (xhr.status == 200) {
			}
		}
	}
	xhr.open("GET","LP.php?enchere=0&dudo=1", true);
	xhr.send(null);
}
/*function postE(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if (xhr.status == 200) {
			}
		}
	}
	xhr.open("GET","LP.php?enchere=1&dudo=0", true);
	xhr.send(null);
}*/
function enchere(val,nbr){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if (xhr.status == 200) {
			}
		}
	}
	xhr.open("GET","LP.php?val="+val+"&nbr="+nbr, true);
	xhr.send(null);
}
/*function refreshAction(val,nbr){
	act=document.getElementById('action');
	act.innerHTML="le dernier enchere est de : "+nbr+" des ayant la valeur "+val;
}
function refreshAction(){
	act=document.getElementById('action');
	act.innerHTML="le joueur a dit dudo";
}*/