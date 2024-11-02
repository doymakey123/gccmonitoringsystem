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
            
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Activity Log</h1>
        </div>
                
    </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>User Role</th>
            <th>User ID</th>
            <th>Description</th>
            <th>Date Created</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
$query = "SELECT * FROM tbl_history";
$query_run = mysqli_query($connection,$query);

?>


<?php

if (mysqli_num_rows($query_run) > 0)

{

while($row = mysqli_fetch_assoc($query_run))
{

?>


<tr>
<td><?php echo htmlspecialchars($row['id_no']); ?> </td>
<td><?php if($row['user_role'] == 1){ echo htmlspecialchars("Admin");} if($row['user_role'] == 2){ echo htmlspecialchars("Staff");} if($row['user_role'] == 3){ echo htmlspecialchars("User");} ?> </td>
<td><?php echo htmlspecialchars($row['id']); ?> </td>
<td><?php echo htmlspecialchars($row['description']); ?> </td>
<td><?php echo htmlspecialchars($row['date_created']); ?> </td>

            </tr>
        <?php

        }

        }
else {
echo htmlspecialchars("No Record Found");
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



//function for show/hide password
function myFunction() {
  var x = document.getElementById("showpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


//function for show/hide password
function myFunction1() {
  var x = document.getElementById("showpassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


//get user id for specific update using jquery and by calling input or button id
$(document).on('click', '#password', function(){
					
					var id = $(this).data('id1');

          // $('#showpassword1').val(id);
          $('#user_id_password').val(id);

          $('#exampleModal1').modal('toggle');
});


//default js function to hide gate select option tag
$(function(){
    $('#gate').css("display", "none");
});


function displayDivGate(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value == 3 ? 'block' : 'none';
   }
 


</script>

<form action="code.php" method="POST">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <!-- Input Fields -->
                        <div class="form-group">
                        <label for="usr">Password:</label>
                        <input type="password" name="password" class="form-control" id="showpassword1" required>
                        <input type="checkbox" name="checkbox" id="checkbox" onclick="myFunction1()"> Show Password
                        </div>

                        <input type="hidden" name="user_id_password" id="user_id_password">

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn_update_user">Update</button>
                </div>
                </div>
            </div>
            </div>
</form>

