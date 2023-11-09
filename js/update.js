function Update()
{
$.ajax({
type: 'GET',
url: 'tchat.php',
success: function(data){$('#discution').html(data);}
});
   
}
 
$('document').ready(function(){
setInterval('Update();',1000);
});