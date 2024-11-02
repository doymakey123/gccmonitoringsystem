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

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <div class="col-4 float-left">
            <p> 
                Old School Year 
            </p>
      </div>
        
      <div class="col-4">
      </div>
      <div class="col-4 float-right">
              <select name="SchoolYear" class="form-control" onchange="location = this.value;" required>
                <option selected disabled value="old_school_year.php">OLd School Year</option>
                <option value="Student.php">Default</option>
                <option value="current_school_year.php">Current School Year</option>
            </select>
      </div>

    </h6>


  </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Year/Section</th>
            <th>School Year</th>
            <!-- <th>Address</th> -->
            <th>Print</th>
            <th>View</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
     
        <?php

            $schoolyearAdd = date('Y', strtotime('+1 Years'));
            $schoolyearCurrent = date('Y');
            $CompleteSchoolYear1 = $schoolyearCurrent . "-" . $schoolyearAdd;

            $query = "SELECT * FROM tbl_student WHERE status = 1 AND school_year != '$CompleteSchoolYear1'";
            $query_run = mysqli_query($connection,$query);

        ?>


<?php

if (mysqli_num_rows($query_run) > 0)

{

while($row = mysqli_fetch_assoc($query_run))
{

?>


<tr style="text-transform: capitalize;">
<td><?php echo htmlspecialchars($row['id_no']); ?> </td>
<td><?php echo htmlspecialchars($row['fname']." ".$row['mname']. " " .$row['lname']). " " .$row['ext_name']; ?> </td>
<td><?php echo htmlspecialchars($row['section']. " - ". $row['grade']); ?> </td>
<td><?php echo htmlspecialchars($row['school_year']); ?> </td>
<!-- <td><?php //echo htmlspecialchars($row['address']); ?> </td> -->
<!-- <td><?php //if($row['status'] == 0){ echo htmlspecialchars("In Active");} if($row['status'] == 1){ echo htmlspecialchars("Active");} ?> </td> -->
<!-- <img src="" alt="" style="width: 100px; height:100px;"> -->

<td width="2%">
            <form action="pdffile/view_student_idcard.php" method="post" target="_blank">
                    <input type="hidden" name="view_Rid" value="<?php echo htmlspecialchars($row['id_no']); ?>">
                    <input type="hidden" name="view_Rfname" value="<?php echo htmlspecialchars($row['fname']); ?>">
                    <input type="hidden" name="view_Rmname" value="<?php echo htmlspecialchars($row['mname']); ?>">
                    <input type="hidden" name="view_Rlname" value="<?php echo htmlspecialchars($row['lname']); ?>">
                    <input type="hidden" name="view_Rsuffix" value="<?php echo htmlspecialchars($row['ext_name']); ?>">
                    <button  type="submit" name="viewR_btn_idcard" class="btn btn-info btn-circle"><i class="fas fa-id-card"></i></button>
            </form>
  </td>

  <td width="2%">
            <form action="pdffile/view_student.php" method="post" target="_blank">
                    <input type="hidden" name="view_Rid" value="<?php echo htmlspecialchars($row['id_no']); ?>">
                    <input type="hidden" name="view_Rfname" value="<?php echo htmlspecialchars($row['fname']); ?>">
                    <input type="hidden" name="view_Rmname" value="<?php echo htmlspecialchars($row['mname']); ?>">
                    <input type="hidden" name="view_Rlname" value="<?php echo htmlspecialchars($row['lname']); ?>">
                    <input type="hidden" name="view_Rsuffix" value="<?php echo htmlspecialchars($row['ext_name']); ?>">
                    <button  type="submit" name="viewR_btn" class="btn btn-info btn-circle"><i class='fas fa-eye'></i></i></button>
            </form>
  </td>

  <td width="2%">
            <form action="edit_student.php" method="post">
                    <input type="hidden" name="edit_yearId" value="3">
                    <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($row['id_no']); ?>">
                    <input type="hidden" name="view_Rfname" value="<?php echo htmlspecialchars($row['fname']); ?>">
                    <input type="hidden" name="view_Rmname" value="<?php echo htmlspecialchars($row['mname']); ?>">
                    <input type="hidden" name="view_Rlname" value="<?php echo htmlspecialchars($row['lname']); ?>">
                    <input type="hidden" name="view_Rsuffix" value="<?php echo htmlspecialchars($row['ext_name']); ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success btn-circle"><i class="fas fa-user-edit"></i></button>
            </form>
  </td>

<!-- <td width="2%">
             <form action ="code.php" method="post">
                  <input  type="hidden" name="delete_id" value="<?php //echo htmlspecialchars($row['id_no']); ?>">
                  <input  type="hidden" name="delete_fname" value="<?php //echo htmlspecialchars($row['fname']); ?>">
                  <input  type="hidden" name="delete_mname" value="<?php //echo htmlspecialchars($row['mname']); ?>">
                  <input  type="hidden" name="delete_lname" value="<?php //echo htmlspecialchars($row['lname']); ?>">
                  <input  type="hidden" name="delete_suffix" value="<?php //echo htmlspecialchars($row['ext_name']); ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger btn-circle"> <i class="fa fa-user-times"></i></button>
              </form>
                
            </td> -->
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