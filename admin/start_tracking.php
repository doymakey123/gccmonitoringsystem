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

        <?php

                if(isset($_POST['add_modal_start_tracking'])){  

                    date_default_timezone_set("Asia/Manila");

                    $track_id = mysqli_real_escape_string($connection,$_POST['track_id']);
                    $startingdate = mysqli_real_escape_string($connection,$_POST['startingdate']);
                    $enddate = mysqli_real_escape_string($connection,$_POST['enddate']);

                    $startdate = strtotime($startingdate);
                    $enddate = strtotime($enddate);

                    $startdate = date('Y-m-d', $startdate);
                    $enddate = date('Y-m-d', $enddate);

        ?>

             <!-- Page Heading -->
             <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> 
                            Student Tracked Record

                            <span class="txt float-right txt-primary"> FROM: <i style="color: black;"> <?php echo $startdate; ?> </i> TO:  <i style="color: black;"> <?php echo $enddate; ?> </i></span>
                </h6>

                    <br> <br>
                    <!-- this code for update image -->
                    <form action="pdffile/view_track_record.php" method="post" target="_blank">
                        <input type="hidden" name="view_track_id" value="<?php echo htmlspecialchars($track_id); ?>">
                        <input type="hidden" name="view_start_date" value="<?php echo htmlspecialchars($startdate); ?>">
                        <input type="hidden" name="view_end_date" value="<?php echo htmlspecialchars($enddate); ?>">
                        <button type="submit" name="btn_track_view" class="btn float-left btn-primary">
                            <i class='fas fa-print'></i>  Print
                        </button>
                    </form>
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
          </tr>
        </thead>
        <tbody>
     
        <?php
   

        $query = "SELECT tbl_record.*, tbl_student.*
                    FROM tbl_record INNER JOIN tbl_student
                    ON tbl_record.stud_id = md5(tbl_student.id_no) 
                    WHERE log_date >= '$startdate' AND log_date <= '$enddate' GROUP BY stud_id"; 
        $query_run = mysqli_query($connection,$query);

?>


<?php

    if (mysqli_num_rows($query_run) > 0)

    $num = 1;

    { 

        while($row = mysqli_fetch_assoc($query_run))
        {
                $stud_rec_id = $row['stud_id'];

                $com_name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ext_name'];
   
?>


                <tr style="text-transform: capitalize;">
                    <!-- <td><?php //echo $row['id']; ?> </td> -->
                    <td><?php echo $num++; ?> </td>
                    <td><?php echo $com_name; ?> </td>
                    <td><?php echo $row['time_inn']; ?> </td>
                    <td><?php echo $row['time_out'];; ?> </td>
                </tr>
<?php
           // }

        }

        }
    }

?>
        
        </tbody>
      </table>

    </div>
</div>

</div>


<?php
    include('include/footer.php');
    include('include/script.php');
?>

<!-- datatable script -->
<script>
 $(document).ready(function() {
    $('#dataTable1').DataTable({
       "order": [[ 0, "DESC" ]],
    });
} );
</script>