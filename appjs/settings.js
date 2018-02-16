$('button#resetpass-submit').on('click', function(){
	
	
	var currentpass = $('input#currentpass').val();
	var newpass = $('input#newpass').val();
	var confirmpass = $('input#confirmpass').val();
	 //alert(confirmpass);
	 
	 var red = '<div class="card-content red-text"><p>Password not has been changed. </p></div>';
	 var green = '<div id="card-alert" class="card green lighten-5"><div class="card-content green-text"><p>Password has been changed. </p></div></div>';
	 if(currentpass == "")
	 {
		 $('div#currentpass-data').text("Please enter the current password");
	 }else
	 {
		  $('div#currentpass-data').text("");
		  
		   $.post('php/settings.php',{currentpass: currentpass, newpass:newpass, confirmpass:confirmpass}, function (data) {
		  
		  if(data =="incorrect")
		  {
			  $('div#currentpass-data').text("Current password is incorrect check again");
			   $("div.passred-container").html(red);
		  }else
		  {
			  if(data =="updated")
			  {
			  $("div.passred-container").html(green);
			  }
			  //alert(data)
			 
		  }

         
        });
	 }
	 
	 if(newpass == "")
	 {
		 $('div#newpass-data').text("Please enter the new password");
	 }else
	 {
		  $('div#newpass-data').text("");
	 }
	  if(confirmpass == "")
	 {
		$('div#confirmpass-data').text("Please enter the new password to confirm");
	 }else
	 {
		$('div#confirmpass-data').text("");
		
		if(confirmpass != newpass)
		{
			$('div#confirmpass-data').text("Please confirm the password");
		}else
		{
			$('div#confirmpass-data').text("");
		}
		
		
	 }
	   
	    
	 
	 
		
	 
}
);