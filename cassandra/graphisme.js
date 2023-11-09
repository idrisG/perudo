function changeImgDes(des,image){
  var x = document.getElementsByClassName(image);
  var v = x.getAttribute("src");
  if(des == 1){
  	v ="1.png";
  	x.setAttribute("src", v);	
  }
  if(des == 2){
  	v ="2.png";
  	x.setAttribute("src", v);	
  }
  if(des == 3){
  	v ="3.png";
  	x.setAttribute("src", v);	
  }
  if(des == 4){
  	v ="4.png";
  	x.setAttribute("src", v);	
  }
  if(des == 5){
  	v ="5.png";
  	x.setAttribute("src", v);	
  }
  if(des == 6){
  	v ="6.png";
  	x.setAttribute("src", v);	
  } 
    
}

function actualisePseudo(pseudo) {
    var x = document.getElementById("joueur");
    x.innerHTML=pseudo;

}



