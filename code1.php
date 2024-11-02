<?php


session_start();


$server_name ="localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_gcc";

$connection = mysqli_connect("$server_name","$db_username","$db_password");
$dbconfig = mysqli_select_db($connection,$db_name);

if($dbconfig)
{
}
else
{
 echo "Database Connection Error";
}


//code for admin password reset
if (isset($_POST['reset_btn'])) {

    $code1 = md5(mysqli_real_escape_string($connection, check_input($_POST['code1'])));
    $code2 = md5(mysqli_real_escape_string($connection, check_input($_POST['code2'])));
    $code3 = md5(mysqli_real_escape_string($connection, check_input($_POST['code3'])));

    if (!empty($code1) || !empty($code2) || !empty($code3)) {

        $oldColde1 = "";
        $oldColde2 = "";
        $oldColde3 = "";
        $oldNumber = "";
        $oldSecuityCode = "";

        $query = "SELECT * FROM tbl_code WHERE status = '1' LIMIT 1";
        $query_run = mysqli_query($connection,$query);

        foreach ($query_run as $row) {

            $oldColde1 = $row['codeone'];
            $oldColde2 = $row['codetwo'];
            $oldColde3 = $row['codethree'];
            $oldNumber = $row['contactno'];
            $oldSecuityCode = $row['seccode'];
        }

        if($code1 == $oldColde1 && $code2 == $oldColde2 && $code3 == $oldColde3){

             //api sms
             $message = "Your Security OTP is " . $oldSecuityCode . " Please do not share to anyone - Gingoog City Colleges.";
             $result = itexmo($oldNumber, $message, "TR-TEEJU008603_BND81", "fr[9b#yc5g");
             if ($result == 0) {
                 //echo "Message Sent!";
             } else {
                 echo "Error Num ". $result . " was encountered!";
             }
             $_SESSION['code_success'] = "5";
            header('Location: code_reset.php');

        }else{

            $_SESSION['status'] = "Codes are not Match!";
            header('Location: reset.php');

        }
    }else{

        $_SESSION['status'] = "Codes not be Empty!";
        header('Location: reset.php');

    }

}




//code for admin password reset otp
if (isset($_POST['otp_btn'])) {

    $otp = mysqli_real_escape_string($connection, check_input($_POST['otp']));
    $oldSecuityCode = "";

    if (!empty($otp)){

        $query = "SELECT * FROM tbl_code WHERE status = '1' LIMIT 1";
        $query_run = mysqli_query($connection,$query);

        foreach ($query_run as $row) {

            $oldSecuityCode = $row['seccode'];

        }

        if($otp == $oldSecuityCode){

             $_SESSION['code_success1'] = "5";
            header('Location: updateAdminPassword.php');

        }else{

            $_SESSION['status'] = "OTP is not Recognized!";
            header('Location: code_reset.php');

        }

    }

}




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




if (isset($_POST['btn_passUpdate'])) {

    $ncode1 = mysqli_real_escape_string($connection, check_input($_POST['code1']));
    $ncode2 = mysqli_real_escape_string($connection, check_input($_POST['code2']));
    $ncode3 = mysqli_real_escape_string($connection, check_input($_POST['code3']));
    $ncontact = mysqli_real_escape_string($connection, check_input($_POST['contact']));
    $npassword = mysqli_real_escape_string($connection, check_input($_POST['pwd']));
    $npassword1 = mysqli_real_escape_string($connection, check_input($_POST['pwd1']));


    if (!empty($ncode1) || !empty($ncode2) || !empty($ncode3) || !empty($ncontact) || !empty($npassword) || !empty($npassword1)) {


        //check code 1 length
        if (strlen($ncode1) <= 7 ){

            $_SESSION['status'] = "Security Code 1 Required atleast 8 Character!";
            header('Location: updateAdminPassword.php');
            die();

        }

        //check code 1 length
        if (strlen($ncode2) <= 7 ){

            $_SESSION['status'] = "Security Code 2 Required atleast 8 Character!";
            header('Location: updateAdminPassword.php');
            die();

        }

        //check code 1 length
        if (strlen($ncode3) <= 7 ){

            $_SESSION['status'] = "Security Code 3 Required atleast 8 Character!";
            header('Location: updateAdminPassword.php');
            die();

        }

         // check if contact only contains 11 numbers
         if (!preg_match("/^[0-9]{11}$/",$ncontact)){

            $_SESSION['status'] = "Only numbers allowed and 11 digit on CONTACT NUMBER!";
            header('Location: updateAdminPassword.php');
            die();
        }

        $uniqid = uniqid();

        $rand_start = rand(1,9);

        $rand_8_char = substr($uniqid,$rand_start,8);


        if($npassword === $npassword1){

            //api sms
            $message = "Your Code 1 is " . $ncode1 . " Code 2 is " .  $ncode2. " and Code 3 is " . $ncode3 . " Please do not share - GCC.";
            $result = itexmo($ncontact, $message, "TR-CRIST310910_M6DCT", "n3e}b4yuvz");
            if ($result == 0) {
                //echo "Message Sent!";
            } else {
                echo "Error Num ". $result . " was encountered!";
            }



            $ncode1 = md5($ncode1);
            $ncode2 = md5($ncode2);
            $ncode3 = md5($ncode3);

            $nhashpassword = md5($npassword1);
           
            $query = "UPDATE tbl_user SET password = '$nhashpassword' WHERE id_no = '1' AND role = '1' LIMIT 1";
            $query_run = mysqli_query($connection, $query);


            if($query_run){

                $his_data = "Admin Updated Security Codes, Contact Number and Admin Password!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $query6 = "UPDATE tbl_code SET codeone ='$ncode1', codetwo = '$ncode2', codethree = '$ncode3', contactno = '$ncontact', seccode = '$rand_8_char' WHERE status = '1' LIMIT 1";
                $query_run6 = mysqli_query($connection,$query6);

                $_SESSION['success'] = "Status Updated Successfully";
                header('Location: index.php');
            }
            else
            {
                $_SESSION['status'] = "Error Updating Data";
                header('Location: updateAdminPassword_reset.php');

            }

        }else{

            
            $_SESSION['status'] = "Password 1 and Password 2 doesn't matched!";
            header('Location: updateAdminPassword.php');            

        }

       

        
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