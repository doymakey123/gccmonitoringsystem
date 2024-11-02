<?php
    include('include/header.php');
    include('../security.php');

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }
    if($_SESSION['role'] != 3)
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
            Backup Data/SQL    
        </h6>
        <h6 class="m-0 font-weight-bold text-warning"> 
            Note: SQL file saved at C:\xampp\htdocs\gcc\backup_sql directory  
        </h6>
    </div>

    <div class="card-body">

        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="code.php" method="post">
                        <button type="submit" name="backup" class="btn btn-info">  Backup Data/SQL </button>
                    </form>
                </div>
                <div class="col">
                    <form method="post" action="" enctype="multipart/form-data" id="frm-restore">
                        <div class="form-row">
                            <div>Choose Backup File</div>
                            <div>
                                <input type="file" name="backup_file" class="input-file" />
                                <input type="submit" name="restore" value="Restore" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br> <br>


        <!-- backup sqlfile from local directory -->
        <div class="table-responsive">

            <table class="table table-bordered " id="dataTable1" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                <tr>
                    <th>SQL File</th>
                </thead>
                <tbody>
            
            <?php
                $num = 1;
                $path    = '../backup_sql/';
                $files = scandir($path);
                $files = array_diff(scandir($path), array('.', '..'));
                foreach ($files as $file) {
                    ?>


                <tr>
                    <td><?php echo htmlspecialchars($file); ?> </td>
                </tr>
            <?php
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
