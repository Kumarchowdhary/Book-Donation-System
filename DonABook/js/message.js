function addmsg(type, msg){
	if(msg>0)
	{
	  $('#nmrmsg').show();
      $('#nmrmsg').text(msg);
	}
	
	
		
	
 
 }
 
function waitForMsg(){
  $.ajax({
       type: "GET",
       url: "message.php",
       async: true,
       cache: false,
       timeout:50000,
       success: function(data){
       addmsg("new", data);
       setTimeout(waitForMsg,5000);
	},
});
};
 
$(document).ready(function(){
	$('#nmrmsg').hide();
	$('a').click(function(){
	  $.ajax({
       type:"GET",
       url:"message.php",
       async: true,
       cache: false,
	   data:{
			Status:'status',
			},
       success: function(data){
		   //alert("hello");
	},
});
		
		
		
		
		
	});
waitForMsg();
 
});