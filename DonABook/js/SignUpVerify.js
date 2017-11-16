function  varify(){
	
		$("#error").text("");
		$("#error").show();
		var first=document.getElementById("first").value;
		var last=document.getElementById("last").value;
		var pass=document.getElementById("password").value;
		var confrimpass=document.getElementById("confrimpass").value;
		var nic=document.getElementById("nic").value;
		var contact=document.getElementById("contact").value;
		var email=document.getElementById("email").value;
		var city=document.getElementById("City").value;
		var about=document.getElementById("about").value;
		var niccount=nic.length;
		var nocount=contact.length;
		var pattern=/^[A-Za-z]+$/;
		var emailPattern=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
		//var cnic_no_regex = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/;
		//var no=/^[0-9+]{4}-[0-9+]{7}$/;
		   if(!first.match(pattern)){
			   $("#error").text("please give input FirstName as character");
			   setTimeout( "$('#error').hide();", 4000);
			   return false;
		    }
			if(!last.match(pattern)){
				$("#error").text("please give input LastName as character");
				setTimeout( "$('#error').hide();", 4000);
			    return false;
			}
			if(pass!=(confrimpass)){
			    $("#error").text("Password and Confirm Password not Matched");
				setTimeout( "$('#error').hide();", 4000);
				return false;
			}
			
		    if(!city.match(pattern)){
				$("#error").text("please give input city as character");
				setTimeout( "$('#error').hide();", 4000);
			    return false;
			}
			if(nocount!=12) 
			{
				$("#error").text("please give correct contact number");
				setTimeout( "$('#error').hide();", 4000);
			    return false;
			}
			if(niccount!=15)
			{
			   $("#error").text("please give correct nic number");
			   setTimeout( "$('#error').hide();", 4000);
			    return false;
			}
}