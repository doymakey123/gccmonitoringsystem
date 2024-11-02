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

        <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
            echo '<div class="p-3 mb-2 bg-success text-white" id="message"> '.$_SESSION['success'].'</div>';
            echo '<audio autoplay> <source src="success.mp3" type="audio/mpeg"> </audio>';
            unset($_SESSION['success']);
            }

            if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
            {
            echo '<div class="p-3 mb-2 bg-danger text-white" id="message"> '.$_SESSION['failed'].'</div>';
            echo '<audio autoplay> <source src="fail.mp3" type="audio/mpeg"> </audio>';
            unset($_SESSION['failed']);
            }
        ?>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Camera (GATE <?php if ($_SESSION['gate'] == "1"){ echo "1";} if ($_SESSION['gate'] == "2"){ echo "2";}  ?> ) </h1>
        <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="clockbox"></div>
    </div>

    <!-- Center columns in a Row -->
    <div class="row d-flex justify-content-center text-center">

        <div class="col-4">
        </div>

        <div class="col-4">
                <select name="Camera" class="form-control" onchange="location = this.value;">
                    <option value="index.php" selected>Default Camera</option>
                    <option value="camera1.php">Camera 1</option>
                    <option value="camera2.php">Camera 2</option>
                    <option value="camera3.php">Camera 3</option>
                    <option value="camera4.php">Camera 4</option>
                    <option value="camera5.php">Camera 5</option>
                    <option value="camera6.php">Camera 6</option>
                    <option value="camera7.php">Camera 7</option>
                    <option value="camera8.php">Camera 8</option>
                </select>
        </div>

        <div class="col-4">
        </div>
    </div>

            <br><br><br>


    <video id="preview" style="width: 100%;height: 300px;"> </video>

    <?php

                if (isset($_SESSION['success1']) && $_SESSION['success1'] !='')
                {
                echo '<div class="p-3 mb-2 text-black text-center" id="message2" style="margin-top:-250px;"> <img src="'.$_SESSION['success1'].'" alt="" style="width:250px; height:250px;"> <p> ' . $_SESSION['success2'] . ' </p> </div>';
                unset($_SESSION['success1']);
                unset($_SESSION['success2']);
                }

            ?>


    <form role="form" action="code.php" method="POST">

            <!-- Input Fields -->
            <div class="form-group">
                <input type="hidden" name="namegate" value="<?php echo $_SESSION['gate'];?>">
                <input type="hidden" id="yourInputFieldId" class="form-control" name="yourInputFieldId" required style="text-align: center; " readonly>
            </div>

    </form>




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


      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        document.getElementById("yourInputFieldId").value = content; // Pass the scanned content value to an input field
        document.forms[0].submit(); //this code is to post or process to insert data into mysql database
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 1) {
            scanner.start(cameras[1]);
        }
        else if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

        // error meesage fadeOut
        $('document').ready(function(){ 
        $("#message").fadeIn(1000).fadeOut(5000); 
        })

        // error meesage fadeOut
        $('document').ready(function(){ 
        $("#message2").fadeIn(1000).fadeOut(5000); 
        })


  </script> 