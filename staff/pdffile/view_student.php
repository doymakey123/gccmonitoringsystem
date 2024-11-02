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




if(isset($_POST['viewR_btn'])){

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
        $com_name = $fname . " " . $mname . " " . $lname . " " . $suffix;

        //for student id number using substr function
        $id = $row['id_no'];
        $str_length = 7;

        //left padding if number < $str_length
        $str = substr("00000{$id}", - $str_length);

        //age calculation
        $bdate = $row["bod"];
        $age = date_diff(date_create($bdate), date_create('now'))->y;

        $nameStatus = "";
        if($status == 0){
            $nameStatus = "Inactive";
        }

        if($status == 1){
            $nameStatus = "Active";
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


                                <div class="header" style="text-align: center; color:black" >

                                    <img src="gcclogo.png" style=" width: 120px; height:120px; left:50%;">

                                   <div style="margin-top:-40px; font-size: 15px;">
                                        <p style=""> <b> GINGOOG CITY COLLEGES, INC. </b> 
                                        <br> <small> Paz Village. Brgy 24-A, Macopa St. Gingoog  </small>
                                        <br> <small> Tel. No. (088) 861-1432 / (08842) 7385 </small> </p>
                                   </div>
                                    

                                </div>

                                <h2 style="text-align:center;"> Student Personal Information </h2>

                                <br><br>
                                <div class="header" style="text-align: center; width:inherit; color:black; top: 20px;">
                                   
                                    <img src="../../qr_images/'.$filename_qr.'.png" alt="QR CODE" id="image1" style=" width: 200px; height:200px; position:absolute; left:-5px;">

                                   

                                    <img src="../../student_images/'.$image.'" alt="image" id="image2" style="width: 180px; height:180px; position:absolute; right:5px;">
                                </div>
                                
                                <br> <br> <br> <br> <br> <br> <br>
                                <br> <br> <br> <br>

                                
                           
                                    <p> <b> ID NO.: </b>  '.$school_id.' </p> 
                                    <p> <b> Complete Name: </b> '.$com_name. '</p>
                                    <p> <b> Age: </b>  '.$age.' </p>
                                    <p> <b> Gender: </b> '.$gender.' </p>  
                                    <p> <b> Birth Date: </b>  '.$bod.' </p>
                                    <p> <b> Year & Section: </b> '.$section.' - '.$grade.' </p>  
                                    <p> <b> School Year: </b> ' . $school_year . ' </p>  
                                    <p> <b> Mobile Number: </b>  '.$contact.' </p>
                                    <p> <b> Address: </b> '.$address.' </p> 
                                    <p> <b> Status: </b> '.$nameStatus.' </p>  
                         
                               
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


