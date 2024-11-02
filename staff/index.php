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


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="clockbox"></div>
    </div>


    <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total User</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                     $query = "SELECT * FROM tbl_user WHERE username != 'admin' ORDER BY id_no";
                     $query_run = mysqli_query($connection,$query);
                     $row = mysqli_num_rows($query_run);
                     echo $row;
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Student</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                     $query = "SELECT * FROM tbl_student";
                     $query_run = mysqli_query($connection,$query);
                     $total_student = mysqli_num_rows($query_run);
                     echo $total_student;
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Total Female </div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                         $query = "SELECT * FROM tbl_student WHERE gender = 'Female'";
                         $query_run = mysqli_query($connection,$query);
                         $total_female = mysqli_num_rows($query_run);
                         echo $total_female;
                    ?>
                </div>  

                </div>
            
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-female fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Total Male </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                 <?php 
                   $query = "SELECT * FROM tbl_student WHERE gender = 'Male'";
                   $query_run = mysqli_query($connection,$query);
                   $total_male = mysqli_num_rows($query_run);
                   echo $total_male;
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-male fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- End Content Row -->



<?php
    include('include/footer.php');
    include('include/script.php');
?>


<script type="text/javascript">
      tday=new Array  ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
      tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

      function GetClock(){
      var d=new Date();
      var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
      var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

      if(nhour==0){ap=" AM";nhour=12;}
      else if(nhour<12){ap=" AM";}
      else if(nhour==12){ap=" PM";}
      else if(nhour>12){ap=" PM";nhour-=12;}

      if(nmin<=9) nmin="0"+nmin;
      if(nsec<=9) nsec="0"+nsec;

      document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+tday[nday]+", "+nhour+":"+nmin+":"+nsec+ap+"";
      }
      window.onload=function(){
      GetClock();
      setInterval(GetClock,1000);
      }

  </script> 