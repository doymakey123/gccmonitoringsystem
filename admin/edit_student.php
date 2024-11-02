<?php

use Sabberworm\CSS\Value\Value;

include('include/header.php');
    include('../security.php');
    include('pdffile/phpqrcode/qrlib.php');

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }
    if($_SESSION['role'] != 1)
    {
        header("Location: ../index.php");
    }

    $statusCodeCheck = "";
    $query = "SELECT * FROM tbl_code WHERE status = '1'";
    $query_run = mysqli_query($connection,$query);


    if (mysqli_num_rows($query_run) > 0) {

        while ($row = mysqli_fetch_assoc($query_run)) {

            $statusCodeCheck = $row['status'];

        }
    }

    if($statusCodeCheck != 1)
    {
        $_SESSION['failed'] = "Please Set Admin Security Code First before you can Transact!";
        header("Location: adminseccode.php");
    }
    
    include('include/nav.php');

    
?>


<div class="card shadow mb-4">

        <?php
            if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
            {
              echo '<div class="p-3 mb-2 bg-danger text-white" id="message"> '.htmlspecialchars($_SESSION['failed']).'</div>';
              unset($_SESSION['failed']);
            }
        ?>

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> 
            Update Student

            <!-- this code for update image -->
           <form action="edit_student_image.php" method="post">
                <input type="hidden" name="edit_id_image" value="<?php echo htmlspecialchars($_POST['edit_id']); ?>">
                <button type="submit" name="btn_edit_image" class="btn float-right btn-primary">
                    <i class="fas fa-image"></i>  Update Image
                </button>
            </form>
       </h6>
    </div>

    <div class="card-body">

        <?php
            if(isset($_POST['edit_btn'])){
                $id = $_POST['edit_id'];
                $edit_yearID = $_POST['edit_yearId'];

                $id_qr = md5($id); // hashing id number for qr code data
                $filename_qr = $_POST['view_Rfname'] . " " . $_POST['view_Rmname'] . " " . $_POST['view_Rlname'] . " " . $_POST['view_Rsuffix'];
                QRcode::png($id_qr, '../qr_images/'.$filename_qr.'.png');

                $query = "SELECT * FROM tbl_student WHERE id_no ='$id' ";
                $query_run = mysqli_query($connection,$query);

                foreach($query_run as $row){   
        ?>

                        <form role="form" action="code.php" method="POST">
                            <input type="hidden" name ="edit_id" value="<?php echo $row['id_no']; ?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">School ID #:</label>
                                        <input type="number" name="school_id" class="form-control" id="usr" value="<?php echo $row['school_id']; ?>">
                                        </div>

                                         <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>School Year</label>
                                                <select name="schoolYear" class="form-control" id="schoolYear" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <?php
                                                        $date2=date('Y', strtotime('-1 Years'));
                                                        for($i=date('Y'); $i>$date2-5;$i--){
                                                            $q = $i.'-'.($i+1);
                                                            echo '<option value="'.$q.'">'.$i.'-'.($i+1).'</option>';
                                                        }
                                                    ?>
                                                </select>
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="schoolYear1" id="schoolYear1" value="<?php echo $row['school_year'];?>"> 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">First Name:</label>
                                        <input type="text" name="fname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['fname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="fname_image" id="fname_image" value="<?php echo $row['fname'];?>"> 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">Middle Name:</label>
                                        <input type="text" name="mname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['mname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="mname_image" id="mname_image" value="<?php echo $row['mname'];?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">Last Name:</label>
                                        <input type="text" name="lname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['lname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="lname_image" id="lname_image" value="<?php echo $row['lname'];?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr"> Suffix:</label>
                                        <input type="text" name="suffix" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['ext_name']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="suffix_image" id="lname_image" value="<?php echo $row['ext_name'];?>">
 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Gender</label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                        </div>


                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="gender1" id="gender1" value="<?php echo $row['gender'];?>">     
                                        

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <input type="date" name="birthdate" class="form-control" required value="<?php echo $row['bod']; ?>">
                                        </div>

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Grade</label>
                                                <select name="grade" id="grade" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="grade1" id="grade1" value="<?php echo $row['grade'];?>" required> 



                                        <!-- query for course or section -->
                                        <?php
                                            $query1 = "SELECT * FROM tbl_course_section";
                                            $query_run1 = mysqli_query($connection,$query1);

                                        ?>

                                            <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Section</label>
                                                <select name="section" id="section" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    

                                        <?php

                                            if (mysqli_num_rows($query_run1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                        ?>

                                                    <option value="<?php echo $row1['course'];?>"> <?php echo $row1['course'];?> </option>


                                        <?php
                                                }
                                            }
                                        ?>

                                                </select>
                                        </div>
                                        <!-- end query for course or section -->
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="section1" id="section1" value="<?php echo $row['section'];?>" required> 

                                        


                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label for="usr">Contact Number:</label>
                                            <input type="text" name="contact" class="form-control" id="usr" value="<?php echo $row['contact_no']; ?>" pattern="[0]{1}[9]{1}[0-9]{9}" title="Phone number with start 0 and remaing 10 digit with 0-9">
                                        </div>

                                         <!-- Input Fields -->
                                         <div class="form-group">
                                            <label for="usr">Address:</label>
                                            <input type="text" name="address" class="form-control" id="usr" value="<?php echo $row['address']; ?>">
                                        </div>

                                         <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <!-- <option selected disabled value="">-- Select --</option> -->
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                        </div>
                                         <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                         <input type="hidden" name="status1" id="status1" value="<?php echo $row['status'];?>" required> 



                                                    <?php
                                                        // include('include/script.php');
                                                    ?>

                                                    <script>

                                                        // $( document ).ready(function() {

                                                        //     var schoolYear = $('#schoolYear1').val();
                                                        //     var gender = $('#gender1').val();
                                                        //     var grade = $('#grade1').val();
                                                        //     var section = $('#section1').val();
                                                        //     var status = $('#status1').val();

                                                        //     // for school year
                                                        //     $('#schoolYear').val(schoolYear);
                                                           

                                                        //     //for gender option
                                                        //     if(gender=="Female"){
                                                        //        $("#gender").prop('selectedIndex', 2);
                                                        //     }else{
                                                        //         $("#gender").prop('selectedIndex',1);
                                                            
                                                        //     }

                                                        //     // for grade or year level
                                                        //     $('#grade').val(grade);

                                                        //     // for section
                                                        //     $('#section').val(section);


                                                        //     // for status
                                                        //     $('#status').val(status);

                                                           
                                                         
                                                        // });

                                                    </script>
                                            <input type="hidden" name="edit_yearId" value="<?php echo $edit_yearID ?>" required> 
                                            <a href="student.php" class="btn btn-danger">Cancel</a>
                                            <button type="submit" name="updatebtn_student" class="btn btn-primary">Update</button>


                        </form>

        <?php
                }
                
            }else{
                ?>


        <!-- for session display -->
        <?php

            if (isset($_SESSION['idsession'])) {
                $id = $_SESSION['idsession'];
                $yearID = $_SESSION['yearID'];

                $query = "SELECT * FROM tbl_student WHERE id_no ='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
                    ?>

                        <form role="form" action="code.php" method="POST">
                            <input type="hidden" name ="edit_id" value="<?php echo $row['id_no']; ?>">


                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">School ID #:</label>
                                        <input type="number" name="school_id" class="form-control" id="usr" value="<?php echo $row['school_id']; ?>">
                                        </div>

                                         <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>School Year</label>
                                                <select name="schoolYear" class="form-control" id="schoolYear" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <?php
                                                        $date2=date('Y', strtotime('-1 Years'));
                    for ($i=date('Y'); $i>$date2-5;$i--) {
                        $q = $i.'-'.($i+1);
                        echo '<option value="'.$q.'">'.$i.'-'.($i+1).'</option>';
                    } ?>
                                                </select>
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="schoolYear1" id="schoolYear1" value="<?php echo $row['school_year']; ?>"> 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">First Name:</label>
                                        <input type="text" name="fname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['fname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="fname_image" id="fname_image" value="<?php echo $row['fname']; ?>"> 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">Middle Name:</label>
                                        <input type="text" name="mname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['mname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="mname_image" id="mname_image" value="<?php echo $row['mname']; ?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">Last Name:</label>
                                        <input type="text" name="lname" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['lname']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="lname_image" id="lname_image" value="<?php echo $row['lname']; ?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr"> Suffix:</label>
                                        <input type="text" name="suffix" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['ext_name']; ?>">
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for renaming image in local directory -->
                                        <input type="hidden" name="suffix_image" id="lname_image" value="<?php echo $row['ext_name']; ?>">
 

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Gender</label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                        </div>


                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="gender1" id="gender1" value="<?php echo $row['gender']; ?>">     
                                        

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <input type="date" name="birthdate" class="form-control" required value="<?php echo $row['bod']; ?>">
                                        </div>

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Grade</label>
                                                <select name="grade" id="grade" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                        </div>
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="grade1" id="grade1" value="<?php echo $row['grade']; ?>" required> 



                                        <!-- query for course or section -->
                                        <?php
                                            $query1 = "SELECT * FROM tbl_course_section";
                    $query_run1 = mysqli_query($connection, $query1); ?>

                                            <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Section</label>
                                                <select name="section" id="section" class="form-control" required>
                                                    <option selected disabled value="">-- Select --</option>
                                                    

                                        <?php

                                            if (mysqli_num_rows($query_run1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                                    ?>

                                                    <option value="<?php echo $row1['course']; ?>"> <?php echo $row1['course']; ?> </option>


                                        <?php
                                                }
                                            } ?>

                                                </select>
                                        </div>
                                        <!-- end query for course or section -->
                                        <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                        <input type="hidden" name="section1" id="section1" value="<?php echo $row['section']; ?>" required> 

                                        


                                        <!-- Input Fields -->
                                        <div class="form-group">
                                            <label for="usr">Contact Number:</label>
                                            <input type="text" name="contact" class="form-control" id="usr" value="<?php echo $row['contact_no']; ?>" pattern="[0]{1}[9]{1}[0-9]{9}" title="Phone number with start 0 and remaing 10 digit with 0-9">
                                        </div>

                                         <!-- Input Fields -->
                                         <div class="form-group">
                                            <label for="usr">Address:</label>
                                            <input type="text" name="address" class="form-control" id="usr" value="<?php echo $row['address']; ?>">
                                        </div>

                                         <!-- Input Fields -->
                                        <div class="form-group">
                                            <label>Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <!-- <option selected disabled value="">-- Select --</option> -->
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                        </div>
                                         <!-- need to declare hidden input to retrieve data for js function for the option tag -->
                                         <input type="hidden" name="status1" id="status1" value="<?php echo $row['status']; ?>" required> 


                                            <input type="hidden" name="edit_yearId" value="<?php echo $yearID; ?>">
                                            <a href="student.php" class="btn btn-danger">Cancel</a>
                                            <button type="submit" name="updatebtn_student" class="btn btn-primary">Update</button>


                        </form>

        <?php
                }
            }
            }
        ?>


        
    </div>


</div>



<?php
    include('include/footer.php');
    include('include/script.php');
?>


<script language="JavaScript">

    // error meesage fadeOut
    $('document').ready(function(){ 
    $("#message").fadeIn(1000).fadeOut(5000); 
    })

    
    $( document ).ready(function() {

        var schoolYear = $('#schoolYear1').val();
        var gender = $('#gender1').val();
        var grade = $('#grade1').val();
        var section = $('#section1').val();
        var status = $('#status1').val();

        // for school year
        $('#schoolYear').val(schoolYear);


        //for gender option
        if(gender=="Female"){
        $("#gender").prop('selectedIndex', 2);
        }else{
            $("#gender").prop('selectedIndex',1);

        }

        // for grade or year level
        $('#grade').val(grade);

        // for section
        $('#section').val(section);


        // for status
        $('#status').val(status);



    });


</script>