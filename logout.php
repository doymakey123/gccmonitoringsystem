<?php

include('security.php');

session_start();
if(isset($_POST['logout_btn']))
{
    $idrole = $_POST['idrole'];
    $role = $_POST['role'];

    if($role == 1){

        $his_data = "Admin Logout Successfully!";
        $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
        $query_run1 = mysqli_query($connection,$query1);

    }else if($role == 2){

        $his_data = "Staff Logout Successfully!";
        $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('2','$idrole','$his_data')";
        $query_run1 = mysqli_query($connection,$query1);

    }else{

        $his_data = "User Logout Successfully!";
        $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('3','$idrole','$his_data')";
        $query_run1 = mysqli_query($connection,$query1);

    }
 
    

session_destroy();
unset($_SESSION['username']);
header("Location: index.php");
}

?>