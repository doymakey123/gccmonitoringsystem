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
                Track Student
    </h6>
  </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
$query = "SELECT * FROM tbl_record GROUP BY stud_id";
$query_run = mysqli_query($connection,$query);

?>


<?php

if (mysqli_num_rows($query_run) > 0)

{
  $num = 1;
while($row = mysqli_fetch_assoc($query_run))
{
    //$sam_date1 = date('Y-m-d h:i a', $sam_date);
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
        <td width="2%">
            <form action="add_tracking.php" method="post">
                    <input type="hidden" name="track_stud_id" value="<?php echo htmlspecialchars($row['stud_id']); ?>">
                    <button  type="submit" name="track_btn" class="btn btn-success"> Track </button>
            </form>
  </td>
    </tr>
        <?php

        }

        }
else {
// echo "No Record Found";
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
      // "order": [[ 0, "desc" ]]
    });
} );
</script>