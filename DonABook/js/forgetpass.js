$(document).ready(function(){
   $(".signup-form").hide();
   //$('#login').slideDown('slow');
   $("#login").slideUp(2).delay(1000).slideDown('slow');
   $("#confrim").click(function(){
	  var email = $('#email').val();
	  var question=$('#question').val();
	  var answer=$('#answer').val();
	   $.ajax({
			url:'ResetPassword.php',
			type:'POST',
			data: {
				Email:email,Question:question,Answer:answer,
				},
			    success:function(data){
				   if(data==email){
					   $(".signup-form").show();
					   $(".login-form").hide();
					   //$("#emails").val(data);
				   }
				   else{
					   alert("please provide correct information");
					   $('#email').val("");
					   $('#answer').val("");
					   
				   }
			}
		});
    });
});

	
	
	
