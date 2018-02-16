//User Creating form validation



//get admin chekded or not
$_user = "user";
$(document).ready(function(){
    $('input[name="admin"]').click(function(){
        if($(this).prop("checked") == true){
            //alert("Checkbox is checked.");
            $_user = "admin";
        }
        else if($(this).prop("checked") == false){
            //alert("Checkbox is unchecked.");
            $_user = "user";

        }
    });
});





$('button#name-submit').on('click', function(){
    var user_type = $_user;



   var count = 0;

    var epfno = $('input#epfno').val();
    if ($.trim(epfno) == '') {

        $('div#epfno-data').text("Please enter the EPF No");
    } else {
        $('div#epfno-data').text("");
        count = count + 1;
    }



    var name = $('input#name').val();
    if($.trim(name)== ''){

        $('div#name-data').text("Please enter the name");
    }else
    {
        $('div#name-data').text("");
        count = count + 1;
    }


    var nicno = $('input#nicno').val();
    if($.trim(nicno)== ''){

        $('div#nicno-data').text("Please enter the NIC No");
    }else
    {
        $('div#nicno-data').text("");
        count = count + 1;
    }

    var dob = $('input#dob').val();
    if($.trim(dob)== ''){

        $('div#dob-data').text("Please select the Date");
    }else
    {
        $('div#dob-data').text("");
        count = count + 1;
    }



    var address = $('input#address').val();
    if($.trim(address)== ''){

        $('div#addres-data').text("Please enter the address");
    }else
    {
        $('div#addres-data').text("");
        count = count + 1;

    }



   // var user_email = $('input#user_email').val();

    var user_email = $('input#user_email').val();
    if($.trim(user_email)== ''){

        $('div#user_email-data').text("Please enter the Email address");
    }else {

        var x = user_email;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            $('div#user_email-data').text("Not a valid e-mail address");
            return false;
        } else {
            $('div#user_email-data').text("");
            count = count + 1;
        }
    }

    var join = $('input#join').val();
    if($.trim(join)== ''){

        $('div#join-data').text("Please enter the joined date");
    }else
    {
        $('div#join-data').text("");
        count = count + 1;

    }

   var department = $('#department :selected').text();
    var department = $.trim(department);


    if($.trim(department) == 'Choose your option'){

        $('div#department-data').text("Please select the Department");
    }else
    {
        $('div#department-data').text("");
        count = count + 1;

    }


    var group_super = $("input[name='group_super']:checked").val();

    if($.trim(group_super) == "1") {

        var immediate = $('input#autocomplete').val();

        if ($.trim(immediate) == '') {

            $('div#immediate-data').text("Please select the immediate");
        } else {
            $('div#immediate-data').text("");
            count = count + 1;

        }


        var supervisor = $('input#autocomplete2').val();

        if ($.trim(supervisor) == '') {

            $('div#supervisor-data').text("Please select the supervisor ");
        } else {
            $('div#supervisor-data').text("");
            count = count + 1;

        }
    }else
    {
        var supervisor = $('input#autocomplete2').val();

        if ($.trim(supervisor) == '') {

            $('div#supervisor-data').text("Please select the supervisor ");
        } else {
            $('div#supervisor-data').text("");
            count = count + 2;

        }
    }

    var annual = $('input#annual').val();

    if($.trim(annual)== ''){

        $('div#annual-data').text("Please enter the annual");
    }else
    {
        $('div#annual-data').text("");
        count = count + 1;

    }

    var casual = $('input#casual').val();

    if($.trim(casual) == ''){

        $('div#casual-data').text("Please enter the casual");
    }else
    {
        $('div#casual-data').text("");
        count = count + 1;

    }

    var medical = $('input#medical').val();

    if($.trim(medical) == ''){

        $('div#medical-data').text("Please enter the medical");
    }else
    {
        $('div#medical-data').text("");
        count = count + 1;

    }




    //var group1 = $('input#group1:checked').val();
    //var group1 = $("input[name='group1']:checked").val();
   // alert(group1);
    var phoneno = $('input#phoneno').val();

    //var group1 = $('input[name="group1"]:checked').val();
    var tel = $('input#tel').val();


    //alert(join);
    var activate = $("input[name='activate_group1']:checked").val();
    //alert($activate)

    var group_super = $("input[name='group_super']:checked").val();

   //alert(department)


    if(count == 13)
    {



        $.post('register.php',{epfno: epfno, name: name, nicno: nicno, dob: dob, address: address,phoneno: phoneno, tel:tel, user_email: user_email, join: join, immediate: immediate, supervisor: supervisor, annual: annual, casual: casual, medical: medical, department: department, user_type: user_type, activate: activate, group_super: group_super}, function (data) {


                alert(data)

           // alert("Record Entered 111");

        });

    }




});