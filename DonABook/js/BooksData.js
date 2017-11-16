function addBookData(type, msg){
	//alert("hello");
	
	 for(var i = 0; i < msg.length; i++){
		  var photo=msg[i].photo;
		  var adId=msg[i].adId;
		  var title=msg[i].title;
		  var author=msg[i].author;
		  var des=msg[i].description;
		  $('#books').append('<div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><a href="BooksView.php?bookid='+adId+'" ><img src="'+photo+'" alt="" width="255px" height="237px"/></a><h2>'+title+'</h2><h2 style="font-size:13px;">By:'+author+'</h2></div></div><div class="choose"><ul class="nav nav-pills nav-justified"><li><a href="bookmarks.php?bkmark='+adId+'"><i class="fa fa-plus-square"></i>Bookmark</a></li></ul></div></div>');
		  /*$('.sub-menu').add('<div class="productinfo text-center">
				                          <a href="BooksView.php?bookid=<?php echo $row['ad_id']?>" > <img src="<?php echo $row['photo']; ?>" alt="" width="255px" height="237px"/> <a/>
											
											<h2><?php echo $row['title'];?></h2>
											<h2 style="font-size:13px;">By: <?php echo $row['author'];?></h2>
										
										</div>');*/
		 }
	}
 

function waitForBooksData(){
  $.ajax({
       type: "GET",
       url: "BooksData.php",
       //async: true,
	   //cache: false,
	   dataType:"Json",
       timeout:50000,
       success:function(data){
		   //alert("hello");
		        $('#books .product-image-wrapper').remove(); 
		   addBookData("new", data);
           setTimeout(waitForBooksData,15000);
	},
	
});
};

$(document).ready(function(){
waitForBooksData();
});
