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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add User
            </button>

            <form action="code.php" method="POST">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <!-- Input Fields -->
                        <div class="form-group">
                        <label for="usr">Username:</label>
                        <input type="text" name="username" class="form-control" id="usr" required>
                        </div>

                        <!-- Input Fields -->
                        <div class="form-group">
                        <label for="usr">Password:</label>
                        <input type="password" name="password" class="form-control" id="showpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <input type="checkbox" name="checkbox" id="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <!-- Input Fields -->
                        <div class="form-group">
                            <label>Role</label>
                                <select name="role" class="form-control" onchange="displayDivGate('gate', this)" required>
                                    <option selected disabled value="">-- Select --</option>
                                    <option value="3">User</option>
                                    <option value="2">Staff</option>
                                </select>
                        </div>

                        <!-- Input Fields -->
                        <div class="form-group" id="gate">
                            <label>Gate</label>
                                <select name="gate" class="form-control">
                                    <option selected disabled value="">-- Select --</option>
                                    <option value="1">Gate 1</option>
                                    <option value="2">Gate 2</option>
                                </select>
                              <span style="color: red;">* Only required for Users Only! </span>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_user">Add</button>
                </div>
                </div>
            </div>
            </div>
            </form>
  </div>

<div class="card-body">


<div class="table-responsive">

      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Gate</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
$query = "SELECT * FROM tbl_user WHERE username != 'admin'";
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
<td><?php echo htmlspecialchars($row['username']); ?> </td>
<td><?php if($row['role'] == 2){ echo htmlspecialchars("Staff");} if($row['role'] == 3){ echo htmlspecialchars("User");} ?> </td>
<td><?php echo htmlspecialchars($row['gate']); ?> </td>

  <td width="2%">

    <!-- Button trigger modal -->
    <button type="button"  class="btn btn-success btn-circle" data-id1="<?php echo htmlspecialchars($row['id_no']); ?>" data-toggle="modal" data-target="#exampleModal1" id="password">
        <i class="fas fa-user-edit"></i>
    </button>
    <!-- <input  type="text" name="password1" value="<?php //echo htmlspecialchars($row['id_no']); ?>" id="password1"> -->
            
  </td>


<td width="2%">
             <!-- <form action ="code.php" method="post">
                  <input  type="hidden" name="delete_id_user" value="<?php //echo htmlspecialchars($row['id_no']); ?>">
                  <button type="submit" name="delete_btn_user" class="btn btn-danger btn-circle"> <i class="fa fa-user-times"></i></button>
              </form> -->
              <!-- Button trigger modal -->
            <button type="button"  class="btn btn-danger btn-circle" data-id2="<?php echo htmlspecialchars($row['id_no']); ?>" data-toggle="modal" data-target="#exampleModal2" id="userdeleteid">
                <i class="fas fa-user-edit"></i>
            </button>
                
            </td>
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


//get user id for specific delete using jquery and by calling input or button id
$(document).on('click', '#userdeleteid', function(){
					
					var id = $(this).data('id2');

          $('#delete_id_user').val(id);

          $('#exampleModal2').modal('toggle');
});
 


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
                        <input type="password" name="password" class="form-control" id="showpassword1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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

                        <input type="hidden" name="delete_id_user" id="delete_id_user">
                        <button type="submit" name="delete_btn_user" class="btn btn-danger">Delete</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



