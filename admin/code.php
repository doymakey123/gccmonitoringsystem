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


//code for adding student
if (isset($_POST['add_student']))
{
    // from input form
    $img = $_POST['image'];
    $school_id = mysqli_real_escape_string($connection, check_input($_POST['school_id']));
    $school_year = mysqli_real_escape_string($connection, check_input($_POST['schoolYear']));
    $fname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['fname'])));
    $mname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['mname'])));
    $lname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['lname'])));
    $suffix = mysqli_real_escape_string($connection, check_input(ucwords($_POST['suffix'])));
    $gender = mysqli_real_escape_string($connection, check_input(ucwords($_POST['gender'])));
    $birthdate = mysqli_real_escape_string($connection, check_input(ucwords($_POST['birthdate'])));
    $grade = mysqli_real_escape_string($connection, check_input(ucwords($_POST['grade'])));
    $section = mysqli_real_escape_string($connection, check_input(ucwords($_POST['section'])));
    $contact = mysqli_real_escape_string($connection, check_input(ucwords($_POST['contact'])));
    $address = mysqli_real_escape_string($connection, check_input(ucwords($_POST['address'])));
    $status = mysqli_real_escape_string($connection, check_input($_POST['status']));

    //local folderpath/local directory for student image
    $folderPath = "../student_images/";

    //combine complete name for image filename
    $name = $fname . " ". $mname . " " . $lname . " " . $suffix;

    //varialble for current date
    $date_now = new DateTime();



    if(empty($img))
    {
        $_SESSION['failed'] = "Image cannot be empty! Please take a picture!";
        header('Location: add_student.php');
    }
    else
    {
        if (!empty($school_id) || !empty($school_year) || !empty($fname) || !empty($lname) || !empty($gender) || !empty($birthdate) || !empty($grade) || !empty($section) || !empty($contact) || !empty($address) || !empty($status))
        {
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname))
            {
                $_SESSION['failed'] = "Only letters and white space allowed on FIRST NAME!";
                header('Location: add_student.php');
                die();
            }

            // check if mname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$mname))
            {
                $_SESSION['failed'] = "Only letters and white space allowed on MIDDLE NAME!";
                header('Location: add_student.php');
                die();
            }

            // check if lname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname))
            {
                $_SESSION['failed'] = "Only letters and white space allowed on LAST NAME!";
                header('Location: add_student.php');
                die();
            }

            // check if suffix only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$suffix))
            {
                $_SESSION['failed'] = "Only letters allowed on SUFFIX NAME!";
                header('Location: add_student.php');
                die();
            }

            // check if bod is not greater than current date
            // if ($date_now < $birthdate) 
            // {
            //     $_SESSION['failed'] = "Birthdate cannot be greater than on current date!";
            //     header('Location: add_student.php');
            //     die();
            // }

             // check if contact only contains 11 numbers
             if (!preg_match("/^[0-9]{11}$/",$contact))
             {
                 $_SESSION['failed'] = "Only numbers allowed and 11 digit on CONTACT NUMBER!";
                 header('Location: add_student.php');
                 die();
             }else{
                 if(!$contact[0] == 0){
                    $_SESSION['failed'] = "First digit must be Zero(0)!";
                    header('Location: add_student.php');
                    die();
                 }
             }

            $dupsql = "SELECT * FROM tbl_student WHERE (school_id = '$school_id' || fname = '$fname' && mname = '$mname' && lname = '$lname')";
            $duprow = mysqli_query($connection, $dupsql);

            if (mysqli_num_rows($duprow) > 0) 
            {
                $_SESSION['failed'] = "Student Already Exist!";
                header('Location: student.php');
            } 
            else 
            {
                //starting code for storing image to local and to database
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("../student_images/", $image_parts[0]);
                $image_type = $image_type_aux[1];
            
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $name . '.jpeg';
            
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
            
                move_uploaded_file($_FILES['webcam']['tmp_name'], $file);
                //end code of storing image

                $query = "INSERT INTO tbl_student (school_id,school_year,fname,mname,lname,ext_name,gender,bod,grade,section,contact_no,address,img,status) 
                            VALUES 
                        ('$school_id','$school_year','$fname','$mname','$lname','$suffix','$gender','$birthdate','$grade','$section','$contact','$address','$file','$status')";

                $query_run = mysqli_query($connection, $query);

                // $idrole = $_SESSION['id_role'];

                if ($query_run) 
                {

                    $his_data = "Admin Added New Student(School ID: " . $school_id . ") Successfully!";
                    $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                    $query_run5 = mysqli_query($connection,$query5);

                    $_SESSION['success'] = "Student Added Successfully!";
                    header('Location: student.php');
                } 
                else 
                {
                    $his_data = "Admin Encountered Error During Added New Student (School ID: " . $school_id . ")!";
                    $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                    $query_run5 = mysqli_query($connection,$query5);

                    $_SESSION['failed'] = "Error Adding Student!";
                    header('Location: student.php');
                }
            }
        }
    }
}


//code for updating student data
if (isset($_POST['updatebtn_student'])) 
{
    $id = $_POST['edit_id'];
    $school_id = mysqli_real_escape_string($connection, check_input($_POST['school_id']));
    $school_year = mysqli_real_escape_string($connection, check_input($_POST['schoolYear']));
    $fname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['fname'])));
    $mname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['mname'])));
    $lname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['lname'])));
    $suffix = mysqli_real_escape_string($connection, check_input(ucwords($_POST['suffix'])));
    $gender = mysqli_real_escape_string($connection, check_input(ucwords($_POST['gender'])));
    $birthdate = mysqli_real_escape_string($connection, check_input(ucwords($_POST['birthdate'])));
    $grade = mysqli_real_escape_string($connection, check_input(ucwords($_POST['grade'])));
    $section = mysqli_real_escape_string($connection, check_input(ucwords($_POST['section'])));
    $contact = mysqli_real_escape_string($connection, check_input($_POST['contact']));
    $address = mysqli_real_escape_string($connection, check_input(ucwords($_POST['address'])));
    $status = mysqli_real_escape_string($connection, check_input($_POST['status']));
    $yearID = mysqli_real_escape_string($connection, check_input($_POST['edit_yearId']));


    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d');

    //local folderpath/local directory for student image and qr code
    $folderPath = "../student_images/";
    $folderPath1 = "../qr_images/";

    //this code is to identify the old name of image and qr in local directory
    $old_fname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['fname_image'])));
    $old_mname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['mname_image'])));
    $old_lname = mysqli_real_escape_string($connection, check_input(ucwords($_POST['lname_image'])));
    $old_suffix = mysqli_real_escape_string($connection, check_input(ucwords($_POST['suffix_image'])));
    $old_image_name = $folderPath . $old_fname . " ". $old_mname . " " . $old_lname . " " .$old_suffix . ".jpeg";
    $old_image_name1 = $folderPath1 . $old_fname . " ". $old_mname . " " . $old_lname . " " .$old_suffix . ".png";

    

    //combine complete name for image and qr code filename
    $name = $folderPath . $fname . " ". $mname . " " . $lname . " " . $suffix . ".jpeg";
    $name1 = $folderPath1 . $fname . " ". $mname . " " . $lname . " " . $suffix . ".png";



    if (!empty($school_id) || !empty($school_year) || !empty($fname) || !empty($lname) || !empty($gender) || !empty($birthdate) || !empty($grade) || !empty($section) || !empty($contact) || !empty($address) || !empty($status)) 
    {
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z-' ]*$/",$fname))
         {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
             $_SESSION['failed'] = "Only letters and white space allowed on FIRST NAME!";
             header('Location: edit_student.php');
             die();
         }

         // check if mname only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z-' ]*$/",$mname))
         {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
             $_SESSION['failed'] = "Only letters and white space allowed on MIDDLE NAME!";
             header('Location: edit_student.php');
             die();
         }

         // check if lname only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z-' ]*$/",$lname))
         {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
             $_SESSION['failed'] = "Only letters and white space allowed on LAST NAME!";
             header('Location: edit_student.php');
             die();
         }

         // check if suffix only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z-' ]*$/",$suffix))
         {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
             $_SESSION['failed'] = "Only letters allowed on SUFFIX NAME!";
             header('Location: edit_student.php');
             die();
         }


          // check if contact only contains 11 numbers
          if (!preg_match("/^[0-9]{11}$/",$contact))
          {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
              $_SESSION['failed'] = "Only numbers allowed and 11 digit on CONTACT NUMBER!";
              header('Location: edit_student.php');
              die();
          }

          if(!rename($old_image_name,$name))
          {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
            $_SESSION['failed'] = "Image filename can't be rename!";
            header('Location: edit_student.php');
            die();
          }

          if(!rename($old_image_name1,$name1))
          {
            $_SESSION['idsession'] = $id;
            $_SESSION['yearID'] = $yearID;
            $_SESSION['failed'] = "QR Code image filename can't be rename!";
            header('Location: edit_student.php');
            die();
          }

            $query = "UPDATE tbl_student SET school_id='$school_id', school_year='$school_year', fname='$fname',mname='$mname',lname='$lname',ext_name='$suffix',gender='$gender',bod='$birthdate',grade='$grade',section='$section',contact_no='$contact',address='$address',img='$name', status='$status', date_active='$date'  WHERE id_no='$id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            // $idrole = $_SESSION['id_role'];

            if($query_run)
            {
                $his_data = "Admin Updated Student Data (School ID: " . $school_id . ") Successfully!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                if($yearID == 1){

                    $_SESSION['success'] = "Student Updated Successfully";
                    header('Location: student.php');

                }else if($yearID == 2){
   
                    $_SESSION['success'] = "Student Updated Successfully";
                    header('Location: current_school_year.php');

                }else if($yearID == 3){
            
                    $_SESSION['success'] = "Student Updated Successfully";
                    header('Location: old_school_year.php');

                }

            }
            else
            {
                $his_data = "Admin Encountered Error During Updating Student Data (School ID: " . $school_id . ")!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['idsession'] = $id;
                $_SESSION['yearID'] = $yearID;
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: edit_student.php');

            }   
        
    }



}



//code for updating student image
if (isset($_POST['updatebtn_image_student'])) 
{
    $img = $_POST['image'];
    $id = $_POST['edit_id'];
    $fname = $_POST['edit_fname'];
    $mname = $_POST['edit_mname'];
    $lname = $_POST['edit_lname'];
    $suffix = $_POST['edit_suffix'];
    

    //local folderpath/local directory for student image
    $folderPath = "../student_images/";

    //combine complete name for image filename
    $name = $fname . " ". $mname . " " . $lname . " " . $suffix;

    $complete_name = $folderPath . $name .".jpeg";

    if (file_exists($complete_name)) 
    {

        if(empty($img))
        {
            $_SESSION['failed'] = "Image cannot be empty! Please take a picture!";
            header('Location: edit_student_image.php');
        }
        else
        {
            //to remove file or image
            unlink(realpath($complete_name));

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("../student_images/", $image_parts[0]);
            $image_type = $image_type_aux[1];
      
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $name . '.jpeg';
      
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
      
            // print_r($fileName);
    
            move_uploaded_file($_FILES['webcam']['tmp_name'], $file);
    

            $query = "UPDATE tbl_student SET img = '$file' WHERE id_no = '$id' LIMIT 1";
    
            $query_run = mysqli_query($connection, $query);
    
            if ($query_run) {

                $his_data = "Admin Updated Student Image (School ID: " . $school_id . ") Successfully!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['success'] = "Student image updated successfully!";
                header('Location: student.php');
            } else {

                $his_data = "Admin Encountered Error During Updating Student Image (School ID: " . $school_id . ")!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['failed'] = "Update image not successfully!";
                header('Location: edit_student_image.php');
            }
        }
    
    }else{
        $_SESSION['failed'] = "Image not exist in local directory!";
        header('Location: student.php');
    }
}


//code for deleting student data
if(isset($_POST['delete_btn'])){

    $rid = $_POST['delete_id'];
    $school_id = $_POST['delete_school_id'];
    $rfname = $_POST['delete_fname'];
    $rmname = $_POST['delete_mname'];
    $rlname = $_POST['delete_lname'];
    $rsuffix = $_POST['delete_suffix'];

    //local folderpath/local directory for student image
    $folderPath = "../student_images/";
    $folderPath1 = "../qr_images/";

    //combine complete name for image filename
    $name = $rfname . " ". $rmname . " " . $rlname . " " . $rsuffix;

    $complete_name = $folderPath . $name .".jpeg";
    $complete_name1 = $folderPath1 . $name .".png";
    
    $studid = md5($rid);

    $query = "DELETE FROM tbl_student WHERE id_no ='$rid' LIMIT 1";
    $query3 = "DELETE FROM tbl_record WHERE stud_id = '$studid' ";

    $query_run = mysqli_query($connection,$query);
    $query_run3 = mysqli_query($connection,$query3);
    
    if (file_exists($complete_name)) 
    {
        //to remove file or image
        unlink(realpath($complete_name));

        if (file_exists($complete_name1)) 
        {
            //to remove file or image
            unlink(realpath($complete_name1));
        }
        
        if ($query_run) {

            $his_data = "Admin Deleted Student Data (School ID: " . $school_id . ") Successfully!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);
            

            $_SESSION['success'] = "Student Deleted Successfully!";
            header("Location: inactive_student.php");
        } else {

            $his_data = "Admin Encountered Error During Deleting Student Data (School ID: " . $school_id . ")!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);

            $_SESSION['failed'] = "Error Deleting Student data!";
            header("Location: inactive_student.php");
        }
    }
}



//code for adding user
if (isset($_POST['add_user'])) {

    $user = mysqli_real_escape_string($connection, check_input($_POST['username']));
    $password = md5(mysqli_real_escape_string($connection, check_input($_POST['password'])));
    $role = mysqli_real_escape_string($connection, check_input($_POST['role']));
    $gate = mysqli_real_escape_string($connection, check_input($_POST['gate']));

    if (!empty($user) || !empty($password) || !empty($role)){

        $dupsql = "SELECT * FROM tbl_user WHERE (username = '$user' AND role = '$role')";
        $duprow = mysqli_query($connection, $dupsql);

        if (mysqli_num_rows($duprow) > 0) 
        {
            $_SESSION['failed'] = "User Already Exist!";
            header('Location: user.php');
        }else{

            if($role != 3){

                if(empty($gate)){

                    $query = "INSERT INTO tbl_user (username, password, role, gate) 
                            VALUES 
                        ('$user','$password','$role', '$gate')";

                    $query_run = mysqli_query($connection, $query);

                    if ($query_run) {

                        $his_data = "Admin Added New User Successfully!";
                        $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                        $query_run5 = mysqli_query($connection,$query5);
            
                        $_SESSION['success'] = "User Added Successfully!";
                        header('Location: user.php');
                    } else {
                        $_SESSION['failed'] = "Error Adding User!";
                        header('Location: user.php');
                    }

                }

            }else{

                if(!empty($gate)){

                    $query = "INSERT INTO tbl_user (username, password, role, gate) 
                            VALUES 
                        ('$user','$password','$role', '$gate')";

                    $query_run = mysqli_query($connection, $query);

                    if ($query_run) {

                        $his_data = "Admin Added New User Successfully!";
                        $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                        $query_run5 = mysqli_query($connection,$query5);

                        $_SESSION['success'] = "User Added Successfully!";
                        header('Location: user.php');
                    } else {
                        $_SESSION['failed'] = "Error Adding User!";
                        header('Location: user.php');
                    }

                }else{

                    $_SESSION['failed'] = "Input Gate not be empty!";
                    header('Location: user.php');
                }

            }

        }

    }else{
        $_SESSION['failed'] = "Please Insert all data in Input Field!";
        header('Location: user.php');
    }

}


//code for deleting user data
if (isset($_POST['delete_btn_user'])) {

    $rid = $_POST['delete_id_user'];

    $query = "DELETE FROM tbl_user WHERE id_no ='$rid' LIMIT 1";

    $query_run = mysqli_query($connection,$query);
        
        if ($query_run) {

            $his_data = "Admin Deleted User (User ID: ". $rid .") Successfully!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);

            $_SESSION['success'] = "User Deleted Successfully!";
            header("Location: user.php");
        } else {
            $_SESSION['failed'] = "Error Deleting User data!";
            header("Location: user.php");
        }

}


//code for updating user data
if (isset($_POST['btn_update_user'])) 
{
    $id = $_POST['user_id_password'];
    $password =md5(mysqli_real_escape_string($connection, check_input($_POST['password'])));




    if (!empty($password)) 
    {


            $query = "UPDATE tbl_user SET password ='$password' WHERE id_no= '$id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "Admin Updated User (User ID: ". $id .") Successfully!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['success'] = "User Updated Successfully";
                header('Location: user.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: user.php');

            }   
        
    }



}



//code for updating admin account data
if(isset($_POST['updatebtn_account'])){

    $id = $_POST['edit_id'];
    $username = 'admin';
    $password =  mysqli_real_escape_string($connection, check_input($_POST['password']));
    $password1 =  mysqli_real_escape_string($connection, check_input($_POST['password1']));
    $oldOtpCode = "";
    $contact = "";
    
    if(!empty($password) || !empty($password1)){

        if($password === $password1){

            $query = "SELECT * FROM tbl_code WHERE status = '1' LIMIT 1";
            $query_run = mysqli_query($connection,$query);
    
            foreach ($query_run as $row) {
    
                $contact = $row['contactno'];
                $oldOtpCode = $row['seccode'];
    
            }

            //api sms
            $message = "Your OTP is " . $oldOtpCode ." Please do not share - GCC.";
            $result = itexmo($contact, $message, "TR-TEEJU008603_BND81", "fr[9b#yc5g");
            if ($result == 0) {
                //echo "Message Sent!";
            } else {
                echo "Error Num ". $result . " was encountered!";
                echo $contact;
                die();
            }

            $password1 = md5($password);
            $_SESSION['adminPassword'] = $password1;
            $_SESSION['adminID'] = $id;
            $_SESSION['adminUsername'] = $username;
            header('Location: otp_account.php');

            // $password1 = md5($password);

            // $query = "UPDATE tbl_user SET password ='$password1'  WHERE id_no='$id'";
        
            // $query_run = mysqli_query($connection,$query);

            // if($query_run)
            // {
            //     $his_data = "Admin Password Updated Successfully!";
            //     $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            //     $query_run5 = mysqli_query($connection,$query5);

            //     $_SESSION['success'] = "Admin Account Updated Successfully";
            //     header('Location: account.php');
            // }
            // else
            // {
            //     $_SESSION['failed'] = "Error Updating Admin Account";
            //     header('Location: account.php');

            // }

        }else{
            $_SESSION['failed'] = "Password Admin Account not match";
            header('Location: account.php');
        }

    }else{
        $_SESSION['failed'] = "Error Updating Admin Account";
        header('Location: account.php');
    }

}




//code for adding section/course
if (isset($_POST['add_section'])) {

    $section = mysqli_real_escape_string($connection, check_input(ucwords($_POST['section'])));

    if (!empty($section)){

        $dupsql = "SELECT * FROM tbl_course_section WHERE (course = '$section')";
        $duprow = mysqli_query($connection, $dupsql);

        if (mysqli_num_rows($duprow) > 0) 
        {
            $_SESSION['failed'] = "Section/Course Already Exist!";
            header('Location: section.php');
        }else{

            $query = "INSERT INTO tbl_course_section (course) 
                            VALUES 
                        ('$section')";

                $query_run = mysqli_query($connection, $query);

                if ($query_run) 
                {

                    $his_data = "Admin Added New Section/Strand (Section/Strand: ". $section .") Successfully!";
                    $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                    $query_run5 = mysqli_query($connection,$query5);

                    $_SESSION['success'] = "Section/Course Added Successfully!";
                    header('Location: section.php');
                } 
                else 
                {
                    $_SESSION['failed'] = "Error Adding Section/Course!";
                    header('Location: section.php');
                }

        }

    }else{
        $_SESSION['failed'] = "Please Insert all data in Input Field!";
        header('Location: section.php');
    }

}


//code for updating section/course data
if (isset($_POST['btn_update_section'])) 
{
    $id = $_POST['section_course_id'];
    $section = mysqli_real_escape_string($connection, check_input(ucwords($_POST['section'])));



    if (!empty($section)) 
    {


            $query = "UPDATE tbl_course_section SET course ='$section' WHERE id = '$id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "Admin Updated Section/Strand (ID: ". $id .")!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['success'] = "Section/Course Updated Successfully";
                header('Location: section.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: section.php');

            }   
        
    }



}


//code for deleting user data
if (isset($_POST['delete_btn_section'])) {

    $rid = $_POST['delete_id_section'];

    $query = "DELETE FROM tbl_course_section WHERE id ='$rid' LIMIT 1";

    $query_run = mysqli_query($connection,$query);
        
        if ($query_run) {

            $his_data = "Admin Deleted Section/Strand (ID: ". $rid .") Successfully!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);

            $_SESSION['success'] = "Section/Course Deleted Successfully!";
            header("Location: section.php");
        } else {
            $_SESSION['failed'] = "Error Deleting Data!";
            header("Location: section.php");
        }

}



//code for updating official data
if (isset($_POST['updatebtn_official'])) 
{
    $id = $_POST['edit_id_official'];
    $official = mysqli_real_escape_string($connection, check_input(ucwords($_POST['official'])));

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' .]*$/",$official))
    {
        $_SESSION['failed'] = "Only letters and white space allowed!";
        header('Location: official.php');
        die();
    }



    if (!empty($official)) 
    {


            $query = "UPDATE tbl_official SET name ='$official' WHERE id = '$id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "Admin Updated Official/President Name Successfully!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);
                $_SESSION['success'] = "Official Name Updated Successfully";
                header('Location: official.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: official.php');

            }   
        
    }



}

//code for backupdata or sql data
if (isset($_POST['backup'])) 
{
   
     $PATH="C:/xampp/htdocs/gcc/backup_sql/";
     $FILE_NAME="Gingoog_City_Colleges_" . date("Y-m-d") . ".sql";


    exec('C:/xampp/mysql/bin/mysqldump --user=root --password="" db_gcc > ' . $PATH.$FILE_NAME);



        $his_data = "Admin Backup Data Successfully!";
        $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
        $query_run5 = mysqli_query($connection,$query5);
        $_SESSION['success'] = "Database backup completed.";
        header('Location: backup_sql.php');

}



//code for updating student status data
if (isset($_POST['btn_update_studentStatus'])) 
{
    $id = $_POST['user_id_status'];
    $status = mysqli_real_escape_string($connection, check_input(ucwords($_POST['status'])));

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d');



    if (!empty($status)) 
    {


            $query = "UPDATE tbl_student SET status ='$status', date_active = '$date' WHERE id_no = '$id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {
                $his_data = "Admin Updated Student Status (STATUS: ". $status .")!";
                $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                $query_run5 = mysqli_query($connection,$query5);

                $_SESSION['success'] = "Status Updated Successfully";
                header('Location: inactive_student.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: inactive_student.php');

            }   
        
    }



}


//restore or import sql file to database
if(isset($_POST["restore"])) {
 
	$target_file = check_input(basename($_FILES["sql_file"]["name"]));
	$sqlFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// check if file have a valid sql extension
	if($sqlFileType == "sql") {

		$query = file_get_contents("C:/xampp/htdocs/gcc/backup_sql/$target_file");
	    $con = new PDO("mysql:host=localhost;dbname=db_gcc","root","");
	    $stmt = $con->prepare($query);

	    if($stmt->execute()){

            $his_data = "Admin Restored Database(SQL) Successfully!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);

            $_SESSION['success'] = "Restored Successfully!";
            header('Location: backup_sql.php');
	    }else{

            $his_data = "Admin Restoring Database(SQL) was not Success!";
            $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
            $query_run5 = mysqli_query($connection,$query5);

            $_SESSION['failed'] = "Restore Failed!";
            header('Location: backup_sql.php');
        }


	}else{

        $his_data = "Admin trying to upload invalid sql file!";
        $query5 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
        $query_run5 = mysqli_query($connection,$query5);

        $_SESSION['failed'] = "Invalid File!";
        header('Location: backup_sql.php');
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
