$('button#notiyes-submit').on('click', function(){
	
	
	var acceptbutton = $(this).val();
	 //alert(acceptbutton);
	 var state = "approved";
	 
	 
	  $.post('php/notification.php',{acceptbutton: acceptbutton, state:state}, function (data) {

            alert(data)
            //alert("Record Entered");
			//refresing the the notification data after accept
			$.post('notificationcontent.php',{}, function (data) {
		   
		   
           $("div.notifaction-container").html(data);
		   
		   

			});

        });
		
	 
}

);



$('button#notino-submit').on('click', function(){
	
	//alert("no");
	
	var acceptbutton = $(this).val();
	var state = "rejected";
	 $.post('php/notification.php',{acceptbutton: acceptbutton, state:state}, function (data) {

            alert(data)
            //alert("Record Entered");
			
			//refresing the the notification data after accept
			$.post('notificationcontent.php',{}, function (data) {
		   
		   //refresing the the notification data after reject
           $("div.notifaction-container").html(data);
		   
		   

			});
			

        });
}

);