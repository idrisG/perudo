function changeImg(){ 
  images = document.getElementsByTagName('img');
  for (var i = 0; i < images.length; i++) {
  	d=Math.floor((Math.random() * 6) + 1);
  	images[i].src="./image/"+d+".png";
  }
}
function des(){
	window.setInterval(changeImg,250);
}