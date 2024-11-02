<?php
    include('include/header.php');
    include('../security.php');

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }
    if($_SESSION['role'] != 2)
    {
        header("Location: ../index.php");
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
        Update Student Image    
        </h6>
    </div>
    <div class="card-body">


        <?php
            if (isset($_POST['btn_edit_image'])) 
            {
                $id = $_POST['edit_id_image'];

                $query = "SELECT * FROM tbl_student WHERE id_no ='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) 
                {
        ?>

                    <form role="form" action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="card-deck">
                            <div class="col-4">
                                <h6 class="m-0 font-weight-bold text-primary">
                                Live Capture
                                </h6>
                                <div id="my_camera" class="text-center"></div>
                                <br/>
                                <input type=button class="btn btn-primary " value="Take Snapshot" onClick="take_snapshot()">
                                <input type="hidden" name="image" class="image-tag" id="image-tag">
                            
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

                        
                        <input type="hidden" name="edit_fname" value="<?php echo htmlspecialchars($row['fname']); ?>">
                        <input type="hidden" name="edit_mname" value="<?php echo htmlspecialchars($row['mname']); ?>">
                        <input type="hidden" name="edit_lname" value="<?php echo htmlspecialchars($row['lname']); ?>">
                        <input type="hidden" name="edit_suffix" value="<?php echo htmlspecialchars($row['ext_name']); ?>">

                        <div class="modal-footer">
                            <a href="student.php" class="btn btn-danger">Cancel</a>
                            <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($row['id_no']); ?>">
                            <button type="submit" name="updatebtn_image_student" class="btn btn-primary ">Update</button>
                        </div>


                    </form>

        <?php
                }
            } 
        ?>

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
            $("#image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="width: 220px; height: 220px;"/>';
        } );
    }


    // error meesage fadeOut
    $('document').ready(function(){ 
    $("#message").fadeIn(1000).fadeOut(5000); 
    })
</script>