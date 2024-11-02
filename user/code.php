<?php



include('../security.php'); 

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }

    if($_SESSION['role'] != 3)
    {
        header("Location: ../index.php");
    }

    $idrole = $_SESSION['id_role'];


    //##########################################################################
	// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
	// Visit www.itexmo.com/developers.php for more info about this API
	//##########################################################################
	function itexmo($number,$message,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
}
//##########################################################################


//code for adding data from qr code operate by user
if(isset($_POST['yourInputFieldId'])){
    
    $cameranumber =  mysqli_real_escape_string($connection,$_POST['cameranumber']);
    $name = mysqli_real_escape_string($connection,$_POST['yourInputFieldId']);
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:sa");
    $date = date('Y-m-d');
    
     if (!empty($name)) {
         $dupsql = "SELECT * FROM tbl_student WHERE (md5(id_no) = '$name') LIMIT 1";
         $duprow = mysqli_query($connection, $dupsql);

         foreach ($duprow as $row) {

            //contact number for sending sms
             $school_id = $row['school_id'];
             $rp = $row['contact_no'];
             $studNAME = $row['fname'] . ' ' . $row['lname'];
             $studLNAME = $row['lname'];
             $studIMAGE = $row['img'];
         }

             if (mysqli_num_rows($duprow) > 0) {

                 $dupsql1 = "SELECT * FROM tbl_record WHERE stud_id = '$name' AND log_date = '$date' AND status = '0' AND gate = '1' LIMIT 1";
                 $duprow1 = mysqli_query($connection, $dupsql1);
                        

                 if (mysqli_num_rows($duprow1) > 0) {

                    if ($_SESSION['gate'] == "2") {

                            //api sms
                        $message = "Good day! Mr./Ms. ".$studLNAME." your child has left from school premises - Gingoog City Colleges!";
                        $result = itexmo($rp, $message, "TR-TEEJU008603_BND81", "fr[9b#yc5g");
                        if ($result == 0) {
                            echo "Message Sent!";
                        } else {
                            echo "Error Num ". $result . " was encountered!";
                        }

                        

                        $query = "UPDATE tbl_record SET time_out = '$time', status = '1', gate = '2' WHERE stud_id = '$name' AND log_date = '$date' AND status = '0'";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {

                            if($cameranumber == 1){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera1.php');

                            }else if($cameranumber == 2){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera2.php');

                            }else if($cameranumber == 3){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera3.php');

                            }else if($cameranumber == 4){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera4.php');

                            }else if($cameranumber == 5){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera5.php');

                            }else if($cameranumber == 6){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera6.php');

                            }else if($cameranumber == 7){

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera7.php');

                            }else if($cameranumber == 8){

                               $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera8.php');

                            }else{

                                $_SESSION['success'] = "Student time out Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: index.php');

                            }

                            $his_data = "Student Time Out Successfully, School ID: (" . $school_id . ") !";
                            $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                            $query_run1 = mysqli_query($connection,$query1);

                        }

                    }else{

                        if($cameranumber == 1){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera1.php');

                        }else if($cameranumber == 2){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera2.php');

                        }else if($cameranumber == 3){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera3.php');

                        }else if($cameranumber == 4){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera4.php');

                        }else if($cameranumber == 5){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera5.php');

                        }else if($cameranumber == 6){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera6.php');

                        }else if($cameranumber == 7){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera7.php');

                        }else if($cameranumber == 8){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: camera8.php');

                        }else{

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 2 or Exit Lane!";
                            header('Location: index.php');

                        }

                            $his_data = "Student Trying to Time Out in Gate 1, School ID: (" . $school_id . ") !";
                            $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                            $query_run1 = mysqli_query($connection,$query1);


                    }


                 } else {

                    if($_SESSION['gate'] == "1"){

                        //api sms
                        $message = "Good day! Mr./Ms. ".$studLNAME." your child has arrived at school premises - Gingoog City Colleges!";
                        $result = itexmo($rp, $message, "TR-TEEJU008603_BND81", "fr[9b#yc5g");
                        if ($result == 0) {
                            echo "Message Sent!";
                        } else {
                            echo "Error Num ". $result . " was encountered!";
                        }
                                
                        $query = "INSERT INTO tbl_record (stud_id, time_inn, log_date, status, gate) VALUES ('$name', '$time', '$date', '0', '1')";
                        // $query1 = "INSERT INTO tbl_history (descript) VALUES ('$his_data')";

                        $query_run = mysqli_query($connection, $query);
                                
                            
                        if ($query_run) {

                            
                            if($cameranumber == 1){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera1.php');

                            }else if($cameranumber == 2){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera2.php');

                            }else if($cameranumber == 3){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera3.php');

                            }else if($cameranumber == 4){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera4.php');

                            }else if($cameranumber == 5){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera5.php');

                            }else if($cameranumber == 6){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera6.php');

                            }else if($cameranumber == 7){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera7.php');

                            }else if($cameranumber == 8){

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: camera8.php');

                            }else{

                                $_SESSION['success'] = "Student Time In Successfully";
                                $_SESSION['success1'] = $studIMAGE;
                                $_SESSION['success2'] = $studNAME;
                                header('Location: index.php');

                            }

                            $his_data = "Student Time In Successfully, School ID: (" . $school_id . ") !";
                            $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                            $query_run1 = mysqli_query($connection,$query1);

                        }

                    }else{

                        if($cameranumber == 1){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera1.php');

                        }else if($cameranumber == 2){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera2.php');

                        }else if($cameranumber == 3){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera3.php');

                        }else if($cameranumber == 4){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera4.php');

                        }else if($cameranumber == 5){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera5.php');

                        }else if($cameranumber == 6){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera6.php');

                        }else if($cameranumber == 7){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera7.php');

                        }else if($cameranumber == 8){

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: camera8.php');

                        }else{

                            $_SESSION['failed'] = "Please Scan your QR Code to Gate 1 or Entrance Lane!";
                            header('Location: index.php');

                        }

                            $his_data = "Student Trying to Time In in Gate 2, School ID: (" . $school_id . ") !";
                            $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                            $query_run1 = mysqli_query($connection,$query1);

                    }
                    
                 }
             } else {

                $his_data = "Student/Person Trying to Scan Invalid QR Code!";
                $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                $query_run1 = mysqli_query($connection,$query1);

                 $_SESSION['failed'] = "This QR Code is not recognize. Please Provide a valid QR Code.";
                 header('Location: index.php');
             }
         
     
    }
}



//code for updating user account data
if(isset($_POST['updatebtn_account'])){

    $id = $_POST['edit_id'];
    $username = mysqli_real_escape_string($connection, check_input($_POST['username']));
    $password =  mysqli_real_escape_string($connection, check_input($_POST['password']));
    $password1 =  mysqli_real_escape_string($connection, check_input($_POST['password1']));
    
    if(!empty($password) || !empty($password1)){

        if($password === $password1){

            $password1 = md5($password);

            $query = "UPDATE tbl_user SET password ='$password1'  WHERE id_no='$id'";
        
            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "User Password Updated Successfully!";
                $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                $query_run1 = mysqli_query($connection,$query1);

                $_SESSION['success'] = "User Account Updated Successfully";
                header('Location: account.php');
            }
            else
            {
                $his_data = "Error Updating User Password!";
                $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
                $query_run1 = mysqli_query($connection,$query1);

                $_SESSION['failed'] = "Error Updating User Account";
                header('Location: account.php');

            }

        }else{

            $his_data = "User Password Not Matched, Updating Password Not Successfully!";
            $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
            $query_run1 = mysqli_query($connection,$query1);

            $_SESSION['failed'] = "Password User Account not match";
            header('Location: account.php');
        }

    }else{

        $his_data = "Error Updating User Password!";
        $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
        $query_run1 = mysqli_query($connection,$query1);

        $_SESSION['failed'] = "Error Updating User Account";
        header('Location: account.php');
    }

}


//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}




?>





