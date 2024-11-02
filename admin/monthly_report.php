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
              echo '<div class="p-3 mb-2 bg-success text-white" id="message"> '.htmlspecialchars($_SESSION['success']).'</div>';
              unset($_SESSION['success']);
            }

            if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
            {
              echo '<div class="p-3 mb-2 bg-danger text-white" id="message"> '.htmlspecialchars($_SESSION['failed']).'</div>';
              unset($_SESSION['failed']);
            }
        ?>



<div class="card-body">

<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> 
            Student Monthly Report
       </h6>
    </div>
<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Log Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
    //$date = date('Y-m-d');
    $query = "SELECT * FROM tbl_record WHERE log_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
    $query_run = mysqli_query($connection,$query);

?>


<?php

if (mysqli_num_rows($query_run) > 0)

{
  $num = 1;

while($row = mysqli_fetch_assoc($query_run))
{
    $status = "";
    $stud_rec_id = $row['stud_id'];
    $com_name = "";

    
    if($row['status'] == "0")
    {
        $status = "In";
    }else
    {
        $status = "Out";
    }

    $query1 = "SELECT * FROM tbl_student WHERE md5(id_no) = '$stud_rec_id'";
    $query_run1 = mysqli_query($connection,$query1);

    while($row1 = mysqli_fetch_assoc($query_run1))
    {
        $com_name = $row1['fname'] . " " . $row1['mname'] . " " . $row1['lname'] . " " . $row1['ext_name'];
    }
   

?>


    <tr style="text-transform: capitalize;">
        <!-- <td><?php //echo htmlspecialchars($row['id']); ?> </td> -->
        <td><?php echo htmlspecialchars($num++); ?> </td>
        <td><?php echo htmlspecialchars($com_name); ?> </td>
        <td><?php echo htmlspecialchars($row['time_inn']); ?> </td>
        <td><?php echo htmlspecialchars($row['time_out']); ?> </td>
        <td><?php echo htmlspecialchars($row['log_date']); ?> </td>
        <td><?php echo htmlspecialchars($status); ?> </td>
    </tr>
        <?php

        }

        }
else {
//echo htmlspecialchars("No Record Found");
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
       "order": [[ 0, "desc" ]],
    });
    
} );


// error meesage fadeOut
$('document').ready(function(){ 
  $("#message").fadeIn(1000).fadeOut(5000); 
})
</script>