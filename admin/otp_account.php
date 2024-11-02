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
    
    include('include/nav.php');

    $adminSessionPassword = $_SESSION['adminPassword'];
    $adminSessionID = $_SESSION['adminID'];
    $adminSessionUname = $_SESSION['adminUsername'];

    
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
            One Time Password - OTP (Update Admin Account)   
        </h6>
    </div>

    <div class="card-body">

        <form role="form" action="code1.php" method="POST">

            <input type="hidden" name="adminIDS" value="<?php echo htmlspecialchars($adminSessionID); ?>">
            <input type="hidden" name="adminUnameS" value="<?php echo htmlspecialchars($adminSessionUname); ?>">
            <input type="hidden" name="adminPwdS" value="<?php echo htmlspecialchars($adminSessionPassword); ?>">

            <!-- Input Fields -->
            <div class="form-group">
            <label for="usr">Security Code or One Time Password(OTP):</label>
            <input type="text" name="otpAccount" class="form-control" id="usr" required>
            </div>
             
           
            <button type="submit" name="confirmOtpAccount" class="btn btn-primary">Confirm OTP</button>

        </form>


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
