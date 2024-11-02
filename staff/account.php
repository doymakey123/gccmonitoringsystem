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

    $username1 = $_SESSION['username'];
    $role1 = $_SESSION['role'];
    $idrole = $_SESSION['id_role'];
    
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
            Update User Account    
        </h6>
    </div>

    <div class="card-body">

    <?php

$query = "SELECT * FROM tbl_user WHERE id_no = '$idrole' AND  username = '$username1' AND role = '$role1' LIMIT 1";
$query_run = mysqli_query($connection,$query);

foreach($query_run as $row){   
?>

        <form role="form" action="code.php" method="POST">
            <input type="hidden" name ="edit_id" value="<?php echo $row['id_no']; ?>">

                        <!-- Input Fields -->
                        <div class="form-group">
                        <label for="usr">Username:</label>
                        <input type="text" name="username" class="form-control" id="usr" value="<?php echo $row['username']; ?>" disabled>
                        </div>

                         <!-- Input Fields -->
                         <div class="form-group">
                        <label for="usr">Password:</label>
                        <input type="password" name="password" class="form-control" id="account_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <input type="checkbox" name="checkbox" id="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <!-- Input Fields -->
                        <div class="form-group">
                        <label for="usr">Retype Password:</label>
                        <input type="password" name="password1" class="form-control" id="account_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <input type="checkbox" name="checkbox" id="checkbox1" onclick="myFunction1()"> Show Password
                        </div>

                      
                        <a href="account.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="updatebtn_account" class="btn btn-primary">Update</button>


        </form>

<?php  
}
?>


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
  var x = document.getElementById("account_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


//function for show/hide password
function myFunction1() {
  var x = document.getElementById("account_password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}





</script>