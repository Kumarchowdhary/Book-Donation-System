 $(document).ready(function(){
	$("#contact").keyup(function(){
		var contact=$("#contact").val();
	    if(contact.length==4)
		{
		  contact=contact+"-";
		  $("#contact").val(contact);
		
	    }
	});
	$("#nic").keyup(function(){
	var nic=$("#nic").val();
		
	if(nic.length==5){
		nic=nic+"-";
		$("#nic").val(nic);
	}
	else if(nic.length==13){
		nic=nic+"-";
		$("#nic").val(nic);
	}
	});


});