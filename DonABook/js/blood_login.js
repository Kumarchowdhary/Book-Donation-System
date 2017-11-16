$(document).ready(function(){
		$('#group').hide();
		$('.status').change(function(){
		var status=$('.status').val();
		if(status=="donar"){
		 	$('#group').show();
		}
		else{
			$('#group').hide();
		}
	});
			
});