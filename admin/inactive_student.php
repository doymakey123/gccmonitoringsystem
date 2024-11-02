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
                 Inactive Student
    </h6>
  </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Inactive Since Day(s)</th>
            <th>View</th>
            <th>Status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
$query = "SELECT * FROM tbl_student WHERE status = 0";
$query_run = mysqli_query($connection,$query);

?>


<?php

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d');
    $date =  strtotime($date);

if (mysqli_num_rows($query_run) > 0)

{

while($row = mysqli_fetch_assoc($query_run))
{
    $date2 = $row['date_active'];
    $date2 =  strtotime($date2);

    // Calculating the difference in timestamps
    $diff = ($date - $date2);
  
    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    $diff2 =  ($diff / 86400);

?>


<tr style="text-transform: capitalize;">
<td><?php echo htmlspecialchars($row['id_no']); ?> </td>
<td><?php echo htmlspecialchars($row['fname']." ".$row['mname']. " " .$row['lname']). " " .$row['ext_name']; ?> </td>
<td> <?php echo htmlspecialchars($diff2) ?> </td>
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
                    <button type="button"  class="btn btn-success btn-circle" data-id1="<?php echo htmlspecialchars($row['id_no']); ?>" data-toggle="modal" data-target="#exampleModal1" id="user_status">
                      <i class="fas fa-user-edit"></i>
                  </button>
  </td>

<td width="2%">
             <!-- <form action ="code.php" method="post">
                  <input  type="hidden" name="delete_id" value="<?php //echo htmlspecialchars($row['id_no']); ?>">
                  <input  type="hidden" name="delete_school_id" value="<?php //echo htmlspecialchars($row['school_id']); ?>">
                  <input  type="hidden" name="delete_fname" value="<?php //echo htmlspecialchars($row['fname']); ?>">
                  <input  type="hidden" name="delete_mname" value="<?php //echo htmlspecialchars($row['mname']); ?>">
                  <input  type="hidden" name="delete_lname" value="<?php //echo htmlspecialchars($row['lname']); ?>">
                  <input  type="hidden" name="delete_suffix" value="<?php //echo htmlspecialchars($row['ext_name']); ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger btn-circle"> <i class="fa fa-user-times"></i></button>
              </form> -->
              <button type="button"  class="btn btn-danger btn-circle" data-id2="<?php echo htmlspecialchars($row['id_no']); ?>" data-id3="<?php echo htmlspecialchars($row['school_id']); ?>" data-id4="<?php echo htmlspecialchars($row['fname']); ?>" data-id5="<?php echo htmlspecialchars($row['mname']); ?>" data-id6="<?php echo htmlspecialchars($row['lname']); ?>" data-id7="<?php echo htmlspecialchars($row['ext_name']); ?>" data-toggle="modal" data-target="#exampleModal2" id="studentdeleteid">
                <i class="fas fa-user-times"></i>
            </button>
                
            </td>
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
      "order": [[ 2, "desc" ]],
    });
    
} );


// error meesage fadeOut
$('document').ready(function(){ 
  $("#message").fadeIn(1000).fadeOut(5000); 
})

//get user id for specific update using jquery and by calling input or button id
$(document).on('click', '#user_status', function(){
					
					var id = $(this).data('id1');

          // $('#showpassword1').val(id);
          $('#user_id_status').val(id);

          $('#exampleModal1').modal('toggle');
});


//get user id for specific delete using jquery and by calling input or button id
$(document).on('click', '#studentdeleteid', function(){
					
					var id = $(this).data('id2');
          var schooldid = $(this).data('id3');
          var fname = $(this).data('id4');
          var mname = $(this).data('id5');
          var lname = $(this).data('id6');
          var suffix = $(this).data('id7');

          $('#delete_id').val(id);
          $('#delete_school_id').val(schooldid);
          $('#delete_id_fname').val(fname);
          $('#delete_id_mname').val(mname);
          $('#delete_id_lname').val(lname);
          $('#delete_id_suffix').val(suffix);

          $('#exampleModal2').modal('toggle');
});


</script>

<form action="code.php" method="POST">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Student Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <!-- Input Fields -->
                      <div class="form-group">
                          <label>Status</label>
                              <select name="status" class="form-control" required>
                                  <!-- <option selected disabled value="">-- Select --</option> -->
                                  <option value="1">Active</option>
                                  <option selected disabled value="">In Active</option>
                              </select>
                      </div>

                        <input type="hidden" name="user_id_status" id="user_id_status">

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn_update_studentStatus">Update</button>
                </div>
                </div>
            </div>
            </div>
</form>

<!-- Logout Modal-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Please confirm to Delete?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="code.php" method="POST"> 
                          <input  type="hidden" name="delete_id" id="delete_id">
                          <input  type="hidden" name="delete_school_id" id="delete_school_id">
                          <input  type="hidden" name="delete_fname" id="delete_id_fname">
                          <input  type="hidden" name="delete_mname" id="delete_id_mname">
                          <input  type="hidden" name="delete_lname" id="delete_id_lname">
                          <input  type="hidden" name="delete_suffix" id="delete_id_suffix">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
