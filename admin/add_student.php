<?php
    include('include/header.php');
    include('../security.php');

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
        Add Student    
        </h6>
    </div>
    <div class="card-body">

        <form role="form" action="code.php" method="POST" enctype="multipart/form-data">

            <div class="card-deck">
                        <div class="col-4">
                            <h6 class="m-0 font-weight-bold text-primary">
                            Live Capture
                            </h6>
                            <div id="my_camera" class="text-center"></div>
                            <br/>
                            <input type=button class="btn btn-primary " value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        
                        </div>
                        <div class="col-5">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">
                                Your captured image
                            </h6>
                            <div id="results"> </div> -->
                        </div>
                        <br>
                        <div class="col-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Captured Image
                            </h6> <br>
                            <div id="results"> </div>
                        </div>
            </div>
           

            <br> <br>

             <!-- Input Fields -->
             <div class="form-group">
            <label for="usr">School ID #:</label>
            <input type="number" name="school_id" class="form-control" id="usr" required>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
                <label>School Year</label>
                    <select name="schoolYear" class="form-control" required>
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

            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr">First Name:</label>
            <input type="text" name="fname" class="form-control" id="usr" style="text-transform: capitalize;" required>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr">Middle Name:</label>
            <input type="text" name="mname" class="form-control" id="usr" style="text-transform: capitalize;">
            </div>

            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr">Last Name:</label>
            <input type="text" name="lname" class="form-control" id="usr" style="text-transform: capitalize;" required>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr"> Suffix:</label>
            <input type="text" name="suffix" class="form-control" id="usr" style="text-transform: capitalize;">
            </div>


            <!-- Input Fields -->
            <div class="form-group">
                <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option selected disabled value="">-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
                <label>Birthdate</label>
                <input type="date" name="birthdate" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
                <label>Grade</label>
                    <select name="grade" class="form-control" required>
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

            <!-- query for course or section -->
            <?php
                 $query = "SELECT * FROM tbl_course_section";
                 $query_run = mysqli_query($connection,$query);

            ?>

                <!-- Input Fields -->
            <div class="form-group">
                <label>Section</label>
                    <select name="section" class="form-control" required>
                        <option selected disabled value="">-- Select --</option>
                        

            <?php

                 if (mysqli_num_rows($query_run) > 0) {
                     while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                        <option value="<?php echo $row['course'];?>"> <?php echo $row['course'];?> </option>


            <?php
                     }
                 }
            ?>

                    </select>
            </div>
             <!-- end query for course or section -->


            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr">Contact Number:</label>
            <input type="text" name="contact" class="form-control" id="usr" pattern="[0]{1}[9]{1}[0-9]{9}" title="Phone number with start 09 and remaing 9 digit with 0-9" required>
            </div>

             <!-- Input Fields -->
             <div class="form-group">
            <label for="usr">Address:</label>
            <input type="text" name="address" class="form-control" id="usr" required>
            </div>

            <!-- Input Fields -->
            <div class="form-group">
                <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option selected disabled value="">-- Select --</option>
                        <option value="1">Active</option>
                        <option disabled value="0">In Active</option>
                    </select>
            </div>

            <div class="modal-footer">
                <a href="student.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="add_student" class="btn btn-primary ">Save</button>
            </div>


        </form>

    </div>


</div>



<?php
    include('include/footer.php');
    include('include/script.php');
?>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 250,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="width: 220px; height: 220px;"/>';
        } );
    }


    // error meesage fadeOut
    $('document').ready(function(){ 
    $("#message").fadeIn(1000).fadeOut(5000); 
    })
</script>