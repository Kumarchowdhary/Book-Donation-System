function addnotify(type, msg){
	//alert(msg);
	if(msg>=1)
	{
	  $('#nmrnot').show();
      $('#nmrnot').text(msg);
	}
	
 }
 
function waitForNoti(){
  $.ajax({
       type: "GET",
       url: "notification.php",
	   //dataType:'json',
       async: true,
       cache: false,
       timeout:50000,
       success: function(data){
		  //alert(data);
       addnotify("new", data);
       setTimeout(waitForNoti,5000);
	},
});
};
 
$(document).ready(function(){
	$(".sub-menu").mouseover(function(){
	$.ajax({
       type:"GET",
       url:"notification.php",
       async: true,
       cache: false,
	   data:{
			Status:'status',
			},
       success: function(data){
		   $('#nmrnot').hide();
	},
});
	});
waitForNoti();
$('#nmrnot').hide();

});
