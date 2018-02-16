
//Login page validation
$('button#name-submit').on('click', function(){

    var count = 0;

    var epfno = $('input#epfno').val();
    if ($.trim(epfno) == '') {

        $('div#epfno-data').text("Please enter the EPF No");
    } else {
        $('div#epfno-data').text("");
        count = count + 1;
    }

    var pass = $('input#pass').val();
    if ($.trim(pass) == '') {

        $('div#pass-data').text("Please enter the Password");
    } else {
        $('div#pass-data').text("");
        count = count + 1;
    }

    if(count == 2)
    {





      $.post('log.php',{epfno: epfno, pass: pass}, function (data) {


            //$('div#name-data').text(data);
          //alert(data);
         // $('div#name-data').text("aaaa");


          if(data == "ok") {
              window.location.href = "dashboard.php";
              // window.location.href = "log.php";
          }

        });


    }


});