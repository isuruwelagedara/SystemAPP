$('button#generate-submit').on('click', function(){
var count = 0;

    var date_from = $('input#date_from').val();
    if($.trim(date_from)== ''){

        $('div#date_from-data').text("Please select the Date");
    }else
    {
        $('div#date_from-data').text("");
        count = count + 1;
    }

    var date_to = $('input#date_to').val();
    if($.trim(date_to)== ''){

        $('div#date_to-data').text("Please select the Date");
    }else
    {
        $('div#date_to-data').text("");
        count = count + 1;
    }

  //  alert(count)

    if(count == 2) {
        $.post('leavereport.php', {date_from: date_from,date_to: date_to}, function (data) {


            $("div.demo-container").html(data);


        });
    }
});


