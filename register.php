<?php


require_once 'config.php';

if($_POST)
{

    $epfno = ($_POST['epfno']);
    $name_ini = ($_POST['name']);
    $nicno = ($_POST['nicno']);
    $dob = ($_POST['dob']);
    $address = ($_POST['address']);
    $tel = ($_POST['tel']);
    $phoneno = ($_POST['phoneno']);
    $user_email = ($_POST['user_email']);

    $user_type = ($_POST['user_type']);
    $join = ($_POST['join']);

    $supervisor = ($_POST['supervisor']);

    $annual = ($_POST['annual']);
    $casual = ($_POST['casual']);
    $medical = ($_POST['medical']);
    $department = ($_POST['department']);


    $active =  ($_POST['activate']);
//echo $department;



    $date = ($_POST['join']);
    $group_super = ($_POST['group_super']);

        if($group_super == "1")
        {
            $immediate = ($_POST['immediate']);
        }else
        {
            $immediate = "0";
        }




	
	//password_hash see : http://www.php.net/manual/en/function.password-hash.php
	//$password 	= password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
	
    try
    {
        $stmt = $DBcon->prepare("SELECT * FROM users WHERE epf_no=:epfno");
        $stmt->execute(array(":epfno"=>$epfno));
        $count = $stmt->rowCount();



		
        if($count==0){
            $stmt = $DBcon->prepare("INSERT INTO users(epf_no,nic_no,name_ini,dob,address,tp_no,mobile_no,email,user_type,joined_date,password,active,anual,casual,medical,department,immediate_sup,supervisor) VALUES('$epfno','$nicno','$name_ini','$dob','$address','$tel','$phoneno','$user_email','$user_type','$date','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','$active','$annual','$casual','$medical','$department','$immediate','$supervisor')");

            $stmt2 = $DBcon->prepare("INSERT INTO available_leaves(epf_no,annual,casual,medical) VALUES('$epfno','$annual','$casual','$medical')");
            $stmt2->execute();
            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "EPF NO is Already Exist"; //  not available
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>