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

    date_default_timezone_set("Asia/Manila");

    if (isset($_POST['track_btn'])){

        $track_stud_id =  mysqli_real_escape_string($connection, check_input(ucwords($_POST['track_stud_id'])));
?>


<!-- modal pop up for start  tracking customer and other customer -->
<div class="modal fade" id="addmodalstarttracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Please Provide Complete Date and Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="start_tracking.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Starting Date and Time </label>
                        <input type="date" id="startingdate" class="form-control" name="startingdate" required >
                        <!-- <input type="time" id="startingtime" class="form-control" name="startingtime" required > -->
                    </div>

                    <div class="form-group">
                        <label> End Date and Time </label>
                        <input type="date" id="enddate" class="form-control" name="enddate" required >
                        <!-- <input type="time" id="endtime" class="form-control" name="endtime" required > -->
                    </div>


                    <div class="modal-footer">
                        <input type="hidden" name="track_id" value="<?php echo $track_stud_id ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_modal_start_tracking" class="btn btn-primary ">Check</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>





<!-- DataTales Example -->
<div class="card shadow mb-4">

        <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
            echo '<div class="p-3 mb-2 bg-success text-white"> '.$_SESSION['success'].'</div>';
            unset($_SESSION['success']);
            }

            if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
            {
            echo '<div class="p-3 mb-2 bg-danger text-white"> '.$_SESSION['failed'].'</div>';
            unset($_SESSION['failed']);
            }
        ?>

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodalstarttracking">
                <i class="fa fa-user-plus"></i>  Start Tracking
            </button>
    </h6>
  </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Log Date</th>
          </tr>
        </thead>
        <tbody>
     


        <?php
                // if (isset($_POST['track_btn'])){

                //    $track_stud_id =  mysqli_real_escape_string($connection, check_input(ucwords($_POST['track_stud_id'])));


                    $query = "SELECT * FROM tbl_record WHERE stud_id ='$track_stud_id' ";
                    $query_run = mysqli_query($connection,$query);
    
        

                    if (mysqli_num_rows($query_run) > 0){

                        $num = 1;

                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            // $com_name = base64_decode($row['name']);
                            // $com_name = base64_decode($row['name']);
                            // $sam_date = strtotime($row['date_created']);
                            // $sam_date1 = date('Y-m-d h:i a', $sam_date);

                            $stud_rec_id = $row['stud_id'];
                            $com_name = "";

                            $query1 = "SELECT * FROM tbl_student WHERE md5(id_no) = '$stud_rec_id'";
                            $query_run1 = mysqli_query($connection,$query1);

                            while($row1 = mysqli_fetch_assoc($query_run1))
                            {
                                $com_name = $row1['fname'] . " " . $row1['mname'] . " " . $row1['lname'] . " " . $row1['ext_name'];
                            }
        ?>


                            <tr style="text-transform: capitalize;">
                                <!-- <td><?php //echo $row['id']; ?> </td> -->
                                <td><?php echo $num++; ?> </td>
                                <td><?php echo $com_name; ?> </td>
                                <td><?php echo $row['time_inn']; ?> </td>
                                <td><?php echo $row['time_out']; ?> </td>
                                <td><?php echo $row['log_date']; ?> </td>
                            </tr>

        <?php

                        }

            
                }else{
                    echo "No Record Found";
                }
            }
        ?>
        
        </tbody>
      </table>

    </div>
</div>

</div>


<?php

    //validate data
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include('include/footer.php');
    include('include/script.php');
?>

<!-- datatable script -->
<script>
 $(document).ready(function() {
    $('#dataTable1').DataTable({
       "order": [[ 0, "desc" ]]
    });
} );
</script>