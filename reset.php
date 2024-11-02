<?php
session_start();
include('include/header.php'); 
?>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                  <img src="img/gcclogo.jpg" alt="" style="width: 150px; height: 150px;">
                <h3 class="h4 text-gray-900 mb-4">  Reset Admin Password </h3></div>

                <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<br><div class="alert alert-danger" role="alert" id="message"> <i class="fas fa-times "></i> '.$_SESSION['status'].' </i></div>';
                        unset($_SESSION['status']);
                    }
                ?>
              

                <form class="user" action="code1.php" method="POST">

                <p style="color: red;"> <b>Note:</b> Please provide your Admin Code to reset admin password.</p>

                     <!-- Input Fields -->
                     <div class="form-group">
                      <label for="usr">Security Code 1:</label>
                      <input type="number" name="code1" class="form-control" id="usr" minlength="8" required>
                      </div>

                      <!-- Input Fields -->
                     <div class="form-group">
                      <label for="usr">Security Code 2:</label>
                      <input type="number" name="code2" class="form-control" id="usr" minlength="8" required>
                      </div>

                      <!-- Input Fields -->
                     <div class="form-group">
                      <label for="usr">Security Code 3:</label>
                      <input type="number" name="code3" class="form-control" id="usr" minlength="8" required>
                      </div>

            
                        <button type="submit" name="reset_btn" class="btn btn-primary btn-user btn-block"> Reset </button>
                        <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('include/footer.php');
include('include/script.php'); 
?>

<script>
  // error meesage fadeOut
$('document').ready(function(){ 
  $("#message").fadeIn(1000).fadeOut(5000); 
})

//function for show/hide password
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>