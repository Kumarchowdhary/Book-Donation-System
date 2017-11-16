 function Looking() {
	 //alert("hello");
	 var min_length = 0; // min characters to display the autocomplete
	 var keyword = $('#header-search').val();
	
	if (keyword.length >  min_length) {
		
		$.ajax({
			url: 'search.php',
			type: 'GET',
			data: {
				keyword:keyword,Looking:'looking',
				},
			   success:function(data){
				
				//alert("hello");
				$('#looking_list_id').show();
				$('#looking_list_id').html(data);
			}
		});
	} 
	else{
		
		$('#looking_list_id').hide();
	}
}
function Location(){
	 var min_length = 0; // min characters to display the autocomplete
	var keyword = $('#header-search-location').val();
	if (keyword.length >  min_length) {
		$.ajax({
			url: 'search.php',
			type: 'GET',
			data: {
				keyword:keyword,Looking:'location',
				
				},
			    success:function(data){
					
				$('#location_list_id').show();
				$('#location_list_id').html(data);
			}
		});
	} else {
		//alert("empty");
		$('#location_list_id').hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_looking(item) {
	// change input value
	$('#header-search').val(item);
	// hide proposition list
	$('#looking_list_id').hide();
}
function set_location(item) {
	// change input value
	$('#header-search-location').val(item);
	// hide proposition list
	$('#location_list_id').hide();
}


