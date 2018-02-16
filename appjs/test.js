$('button#acccpt-submit').on('click', function(){
	
	
	var acceptbutton = $(this).val();
	 //alert(acceptbutton);
	 var state = "approved";
	// alert("aaaa");
	 
	 
	  $.post('temp.php',{}, function (data) {

           //alert(data)
           $("div.demoo-container").html(data);

        });
	 
}

);



