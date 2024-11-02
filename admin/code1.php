<?php



include('../security.php'); 
if(!$_SESSION['username'])
{
    header("Location: ../index.php");
}
if($_SESSION['role'] != 1)
{
    header("Location: ../index.php");
}

$idrole = $_SESSION['id_role'];



//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
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



//code security for admin password reset
if(isset($_POST['add_code'])){
    
    $codeOne = mysqli_real_escape_string($connection, check_input($_POST['code_one']));
    $codeTwo = mysqli_real_escape_string($connection, check_input($_POST['code_two']));
    $codeThree = mysqli_real_escape_string($connection, check_input($_POST['code_three']));
    $contact = mysqli_real_escape_string($connection, check_input($_POST['contact']));

    $uniqid = uniqid();

    $rand_start = rand(1,9);

    $rand_8_char = substr($uniqid,$rand_start,8);

    if (!empty($codeOne) || !empty($codeTwo) || !empty($codeThree) || !empty($contact)) {

        //check code 1 length
        if (strlen($codeOne) <= 7) {
            $_SESSION['failed'] = "Security Code 1 Required atleast 8 Character!";
            header('Location: adminseccode.php');
            die();
        }

        //check code 1 length
        if (strlen($codeTwo) <= 7) {
            $_SESSION['failed'] = "Security Code 2 Required atleast 8 Character!";
            header('Location: adminseccode.php');
            die();
        }

        //check code 1 length
        if (strlen($codeThree) <= 7) {
            $_SESSION['failed'] = "Security Code 3 Required atleast 8 Character!";
            header('Location: adminseccode.php');
            die();
        }

        // check if contact only contains 11 numbers
        if (!preg_match("/^[0-9]{11}$/", $contact)) {
            $_SESSION['failed'] = "Only numbers allowed and 11 digit on CONTACT NUMBER!";
            header('Location: adminseccode.php');
            die();
        }

        
        //api sms
        $message = "Your Code 1 is " . $codeOne . " Code 2 is " .  $codeTwo. " and Code 3 is " . $codeThree . " Please do not share - GCC.";
        $result = itexmo($contact, $message, "TR-TEEJU008603_BND81", "fr[9b#yc5g");
        if ($result == 0) {
            //echo "Message Sent!";
        } else {
            echo "Error Num ". $result . " was encountered!";
            echo $contact;
            die();
        }

        $codeOne = md5($codeOne);
        $codeTwo = md5($codeTwo);
        $codeThree = md5($codeThree);


            $query = "INSERT INTO tbl_code (codeone, codetwo, codethree, contactno, seccode, status) VALUES ('$codeOne', '$codeTwo', '$codeThree', '$contact', '$rand_8_char', '1')";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "Admin added admin security code and mobile number!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['success'] = "Admin secret code and mobile number added successfully!";
                header('Location: adminseccode.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Adding Data!";
                header('Location: adminseccode.php');

            } 
       
       
    }

    
   
   
   
}





//code for admin password reset otp
if (isset($_POST['confirmOtpAccount'])) {

    $otpAccount = mysqli_real_escape_string($connection, check_input($_POST['otpAccount']));
    $id = mysqli_real_escape_string($connection, check_input($_POST['adminIDS']));
    $username = mysqli_real_escape_string($connection, check_input($_POST['adminUnameS']));
    $password1 = mysqli_real_escape_string($connection, check_input($_POST['adminPwdS']));
    $oldOtpCode = "";

    $uniqid = uniqid();

    $rand_start = rand(1,9);

    $rand_8_char = substr($uniqid,$rand_start,8);

    if (!empty($otpAccount) || !empty($id) || !empty($username) || !empty($password1) ){

        $query = "SELECT * FROM tbl_code WHERE status = '1' LIMIT 1";
        $query_run = mysqli_query($connection,$query);

        foreach ($query_run as $row) {

            $oldOtpCode = $row['seccode'];

        }

        

        if($otpAccount == $oldOtpCode){

            $query1 = "UPDATE tbl_user SET password ='$password1'  WHERE id_no='$id'";
        
            $query_run1 = mysqli_query($connection,$query1);

            if($query_run1)
            {
                $his_data = "Admin Password Updated Successfully!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $query6 = "UPDATE tbl_code SET seccode ='$rand_8_char'  WHERE status='1'";
                $query_run6 = mysqli_query($connection,$query6);

                $_SESSION['success'] = "Admin Account Updated Successfully";
                header('Location: account.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Admin Account";
                header('Location: account.php');

            }


        }else{

            $_SESSION['failed'] = "OTP is not Recognized!";
            header('Location: otp_account.php');

        }

    }

}









?>