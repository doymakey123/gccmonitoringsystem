<?php // Include autoloader 

ob_start();
include('phpqrcode/qrlib.php');
require_once 'autoload.inc.php'; 
// Reference the Dompdf namespace 

use Dompdf\Css\Style;
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$dompdf->getOptions()->setChroot('C:\xampp\htdocs\gcc');




if(isset($_POST['viewR_btn_idcard'])){

    $view_Rid = $_POST['view_Rid'];
    $output = "";
    $filename_qr = $_POST['view_Rfname'] . " " . $_POST['view_Rmname'] . " " . $_POST['view_Rlname'] . " " . $_POST['view_Rsuffix'];
    $id_qr = md5($view_Rid);

    QRcode::png($id_qr, '../../qr_images/'.$filename_qr.'.png');
    
    $connect = mysqli_connect("localhost", "root", "", "db_gcc");

    $query = "
        SELECT * FROM tbl_student WHERE id_no = '$view_Rid' LIMIT 1";
    $result = mysqli_query($connect, $query);

    foreach($result as $row){
        $school_id = $row['school_id'];
        $school_year = $row['school_year'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $suffix = $row['ext_name'];
        $gender = $row['gender'];
        $bod = $row['bod'];
        $grade = $row['grade'];
        $section = $row['section'];
        $contact = $row['contact_no'];
        $address = $row['address'];
        $image = $row['img'];
        $status = $row['status'];
        $com_name = strtoupper($lname) . ", " . $fname . " " . substr($mname,0,1) . " " . $suffix;
        $section1 = $section . " - " . $grade;

        //for student id number using substr function
        $id = $row['id_no'];
        $str_length = 7;

        //left padding if number < $str_length
        $str = substr("00000{$id}", - $str_length);

        //age calculation
        $bdate = $row["bod"];
        $age = date_diff(date_create($bdate), date_create('now'))->y;

        $date2 = date('Y');
        $date3 = date('Y', strtotime('+1 Years'));

        $query1 = "
        SELECT * FROM tbl_official";
        $result1 = mysqli_query($connect, $query1);

        $pre_name =  "";
        $pre_postion = "";
        foreach ($result1 as $row1) {
            $pre_name = strtoupper($row1['name']);
            $pre_postion = $row1['position'];
        }

        $gradeName = "";
        if($grade >= 1 && $grade <= 6){
           $gradeName = "ELEMENTARY";
        }

        if($grade >= 7 && $grade <= 10){
           $gradeName = "JUNIOR HIGH SCHOOL";
        }

        if($grade >= 11 && $grade <= 12){
           $gradeName = "SENIOR HIGH SCHOOL";
        }



        $output ='
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title> Personal Information </title>
                        <style>
                        html {
                           
                        </style>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
                        </head>
                    <body>
                        <div class="container">

                            <div style="width:250px;height:380px;border:1px solid #000; border-radius:20px; float: left;">

                                <div style="background-color: lightblue; height:65px; border-top-left-radius:20px; border-top-right-radius:20px;" >
                                    <img src="gcclogo1.png" alt="" style="width:50px;height:50px; top: position: absolute; margin-top:10px;">
                                    <div style="position: absolute; font-size:12px;">
                                        <p style="position: absolute; margin-top: 10px;  "> GINGOOG CITY COLLEGES, INC. </p>
                                        <span style="position: absolute; margin-top: 25px; font-size:8px; margin-left: 5px;"> <i> Paz, Village, Brgy. 24-A, Macopa St., Gingoog City </i> </span>
                                        <span style="position: absolute; margin-top: 40px; font-size:8px; margin-left: 20px;"> <i> Tel. No. (088) 861-1432 / (08842) 7385 </i> </span>
                                    </div>
                                </div>

                                <div style="background-color: #d2eb34; height:290px; text-align:center; ">
                                    <br>
                                    <span style=""> <b> ID No. </b>'. $school_id.' </span>

                                    <div style="width:150px;height:130px;border:1px solid #000; margin-left:50px; margin-bottom:5px;">
                                        <img src="../../student_images/'.$image.'" alt="" style="width:149px;height:130px;">
                                    </div>

                                        <span style="font-size:16px; text-align:center"> <b>' . $com_name .' </b> </span> <br>
                                        <span style=""> <b>' . $section1 .' </b> </span>

                                     <div style="width:110px;height:30px; background-color: white; border:1px solid white; margin-left:65px; margin-top:10px;  z-index: -1;">
                                        
                                     </div>
                                        <span> Signature</span>


                                </div>

                                <div style=" text-align: center; background-color: lightblue; height:25px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;">
                                    <span style="font-size: 20px;"> ' . $gradeName . ' </span>
                                </div>

                            </div>



                            <div style="width:250px;height:380px;border:1px solid #000; border-radius:20px; float:right;">

                                <div style="background-color: #d2eb34; height:355px; text-align:center; border-top-left-radius: 20px; border-top-right-radius: 20px; ">

                                    <span style="color: #d2eb34; font: size 1px;"> 11</span>
       
                                    <div style="width:200px;height:75px; background-color: white; border:1px solid white; margin-left:22px;  z-index: -1; ">

                                        <span style="font-size: 12.8px;"> In case of emergency, please contact: </span>
                                        <span style="font-size: 13px;">' . $com_name . ' </span> <br>
                                        <span style="font-size: 10px;">' . $address . ' </span> <br>
                                        <span style="font-size: 10px;">' . $contact . ' </span> <br>
                                            
                                    </div>

                                    <br>

                                    <img src="../../qr_images/'.$filename_qr.'.png" alt="" style="width:150px;height:150px; margin-top:10px;">

                                    
                                    <div style="margin-top:-30px;">
                                        <p> <b>' . $pre_name . ' </b> </p>
                                        <span style="font-size: 14px; margin-top:-20px; position:absolute; margin-left: 76px;"> <b> School President </b> </span>
                                    </div>
                                    <br>

                                    <p style="font-size: 12px; "> <i> 
                                    This card is valid for the current school year.
                                    It must be carried by the person whose photo appear herein.
                                     </i> </p>
                                   

                                </div>

                                <div style=" text-align: center; background-color: lightblue; height:25px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; margin-top:-12px;">
                                    <span style="font-size: 20px;"> School Year '. $school_year . '  </span>
                                </div>

                            </div>

                        
                               
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
                        
                    </body>
                    </html>
                '; 
    }


};




echo $output;

$dompdf->loadHtml($output);


$dompdf->setPaper('A4', 'portrait'); 
 

$dompdf->render(); 

 ob_end_clean();

$dompdf->stream('my.pdf', array('Attachment' => 0));


?>


