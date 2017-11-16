
function addnotifyData(type, msg){
	
	 for(var i = 0; i < msg.length; i++){
		  var photo=msg[i].photo;
		  var userId=msg[i].userId;
		  var adId=msg[i].adId;
		  var ntfId=msg[i].ntfId;
		  var fname=msg[i].fname;
		  var lname=msg[i].lname;
		  var title=msg[i].title;
		  var adStatus=msg[i].adstatus;
		  $('.sub-menu').append(msg[i].status==1 ? '<li><img src='+photo+' width="10%" style="border-radius:100%;height:50px;"><a   style="margin-left:5px; text:white;font-size:12px;" href="confirmation_profile.php?uid='+userId+'& bookid='+adId+'& ntfid='+ntfId+'">'+fname+' '+lname+' accepted your request for<b> '+title+'</b> book.</a></li>': msg[i].status==2 ? '<li><img src='+photo+' width="10%" style="border-radius:100%;height:50px;"><a style="margin-left:5px; text:white;font-size:12px;" href="#">'+fname+' '+lname+' rejected your request for<b> '+title+'</b> book.</a></li>':adStatus==2 && msg[i].status==0 ? '<li><img src='+photo+' width="10%" style="border-radius:100%;height:50px;"><a style="margin-left:5px; text:white;font-size:12px;" href="#">'+fname+' '+lname+' removed<b> '+title+'</b> book, you requested for.</a></li>':adStatus==0 && msg[i].status==0 ? '<li><img src='+photo+' width="10%" style="border-radius:100%;height:50px;"><a style="margin-left:5px; text:white;font-size:12px;" href="#">'+fname+' '+lname+' deactivated<b> '+title+'</b> book, you requested for.</a></li>':'');
		 }
	}
 

function waitForNotiData(){
  $.ajax({
       type: "GET",
       url: "NotificatinData.php",
       //async: true,
	   //cache: false,
	   dataType:"Json",
       timeout:50000,
       success:function(data){
		   //alert("hello");
		   $('.sub-menu li').remove();      
		   addnotifyData("new", data);
       setTimeout(waitForNotiData,5000);
	},
	
});
};

$(document).ready(function(){
waitForNotiData();
});
