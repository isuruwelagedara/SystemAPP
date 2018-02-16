$('button#acccpt-submit').on('click', function(){
	
	
	 
	 
	  $.post('notificationcontent.php',{}, function (data) {

           //alert(data)
           $("div.notifaction-container").html(data);

        });
	 
}

);