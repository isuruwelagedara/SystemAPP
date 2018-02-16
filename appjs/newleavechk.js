//User Creating form validation


$('button#newleave-submit').on('click', function(){




   var count = 0;
    var group_time = $("input[name='group_time']:checked").val();






    if(group_time > 1)
    {

        count = count + 1;
        if(group_time == 2)
        {

            group_time = "before";
            var group_apply = $("input[name='group_apply']:checked").val()+"-before";
            var n_days = "0.5";
        }else
        {

            group_time = "after";
            var group_apply = $("input[name='group_apply']:checked").val()+"-after";
            var n_days = "0.5";
        }
    }else
        {
        var group_apply = $("input[name='group_apply']:checked").val();
        var n_days = $('input#n_days').val();

        if ($.trim(group_apply) == '') {

            $('div#ltype-data').text("Please select the type of leave");
        } else {
            $('div#ltype-data').text("");
            count = count + 1;

        }
    }

    var group_chk = $("input[name='group_apply']:checked").val()

    //alert(n_days)

    var commence = $('input#commence').val();
    if ($.trim(commence) == '') {

        $('div#commence-data').text("Please select the Date of Commencement");
    } else {
        $('div#commence-data').text("");
        count = count + 1;
    }


    var resuming = $('input#resuming').val();
    if ($.trim(resuming) == '') {

        $('div#resuming-data').text("Please select the Date of Resuming Duties");
    } else {
        $('div#resuming-data').text("");
        count = count + 1;
    }


   // var n_days = $('input#n_days').val();

    if ($.trim(n_days) == '') {

        $('div#n_days-data').text("Please enter the number of days");
    } else {
        $('div#n_days-data').text("");
        count = count + 1;
    }



    var accepted = $('#acceptedd :selected').text();
    if (accepted >= '1') {

        $('div#acceptedd-data').text("");
       // count = count + 1;
    } else {
       // $('div#accepted-data').text("Please select the accepting person");

    }

    var approved = $('#approvedd :selected').text();
    if (approved >= '1') {

        $('div#approvedd-data').text("");
       // count = count + 1;
    } else {
        //$('div#approved-data').text("Please select the approving person");

    }

    var coverup = $('select#coverup').val();
    //var coverup = $('#coverup :selected').text();
	//alert(coverup);

    if (coverup == 'notselected') {

        $('div#coverup-data').text("Please select the covering person");

    } else {
        $('div#coverup-data').text("");
        count = count + 1;

    }


    var reason = $('textarea#reason').val();
    if ($.trim(reason) == '') {

        $('div#reason-data').text("Please enter the Reason for Leave");
    } else {
        $('div#reason-data').text("");
        count = count + 1;
    }

    var leave_apply_date = 11;
/////////////////////////////////////////////////////////////////////////////


    if(count == 6)
    {



        $.post('applyleave.php',{group_apply: group_apply, commence: commence, resuming: resuming, n_days: n_days, accepted: accepted,approved: approved, coverup:coverup, reason: reason,group_chk: group_chk}, function (data) {

            alert(data)
            //alert("Record Entered");

        });
    }




});
