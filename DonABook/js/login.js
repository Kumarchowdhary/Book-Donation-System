$(document).ready(function(){
		$('#forgot').click(function(){
		var emails=$('#email').val();
		if(emails!=""){
		 window.location = 'forgetpass.php?email=' +emails;	
		}
		else{
				alert("please give an email address");
		}
   });
			
});