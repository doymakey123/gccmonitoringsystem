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
            Secure Admin Account  
        </h6>
        <p style="color: red;"> <b>Note:</b> Please remember your Code and your mobile number before adding. </p>
    </div>

    <div class="card-body">

        <?php

          $check_status = "";
          
          $query = "SELECT * FROM tbl_code WHERE status = '1' LIMIT 1";
          $query_run = mysqli_query($connection,$query);

          foreach ($query_run as $row) {
              $check_status = $row['status'];
          }

            if($check_status = 1 && $check_status != ""){ 

        ?>
              

        <?php
            }else{
                ?>

<form role="form" action="code1.php" method="POST">  
                      

                      <!-- Input Fields -->
                      <div class="form-group">
                      <label for="usr">Security Code 1:</label>
                      <input type="number" name="code_one" class="form-control" id="usr"required>
                      </div>


                      <!-- Input Fields -->
                      <div class="form-group">
                      <label for="usr">Security Code 2:</label>
                      <input type="number" name="code_two" class="form-control" id="usr" required>
                      </div>

                      <!-- Input Fields -->
                      <div class="form-group">
                      <label for="usr">Security Code 3:</label>
                      <input type="number" name="code_three" class="form-control" id="usr" required>
                      </div>

                      <!-- Input Fields -->
                      <div class="form-group">
                      <label for="usr">Contact Number:</label>
                      <input type="text" name="contact" class="form-control" id="usr" pattern="[0]{1}[9]{1}[0-9]{9}" title="Phone number with start 09 and remaing 9 digit with 0-9" required>
                      </div>

                    
                      <button type="submit" name="add_code" class="btn btn-primary">Add Security</button>


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



// error meesage fadeOut
$('document').ready(function(){ 
  $("#message").fadeIn(1000).fadeOut(5000); 
})



</script>
