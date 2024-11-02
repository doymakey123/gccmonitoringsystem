<?php // Include autoloader 

ob_start();
require_once 'autoload.inc.php'; 
// Reference the Dompdf namespace 

use Dompdf\Css\Style;
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$dompdf->getOptions()->setChroot('C:\xampp\htdocs\gcc');

$output = '';

$com_start_date = $_POST['view_start_date'];
$com_end_date = $_POST['view_end_date'];

    

$output = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student Tracked Record </title>
    <style>
        th{
            background-color: #D6EEEE;
        }
        th,td{
            border: 1px solid black;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
          }
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

            <h2 style="text-align:center;"> Student Tracked Record </h2>

            <br><br>
            <h5> FROM DATE: '. $com_start_date . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; END DATE: ' . $com_end_date . ' </h5>

                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0" style="border: 1px solid black; table-layout: fixed; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                        </tr>
                                        </thead>
                                        <tbody>';


$connect = mysqli_connect("localhost", "root", "", "db_gcc");

   

if(isset($_POST['btn_track_view']))
{

    $view_Rid = $_POST['view_track_id'];

    $query = "SELECT tbl_record.*, tbl_student.*
    FROM tbl_record INNER JOIN tbl_student
    ON tbl_record.stud_id = md5(tbl_student.id_no) 
    WHERE log_date >= '$com_start_date' AND log_date <= '$com_end_date' GROUP BY stud_id"; 
       
    $query_run = mysqli_query($connect,$query);



    if (mysqli_num_rows($query_run) > 0) 
    {

        $num = 1;

        while ($row = mysqli_fetch_assoc($query_run))
        {
            $com_name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ext_name'];

                $output .='

                                            <tr style="text-transform: capitalize;">
                                                <td>' . $num++ . '</td>
                                                <td>' . $com_name .  '</td>
                                                <td> '. $row['time_inn']. '</td>
                                                <td> '. $row['time_out']. '</td>
                                            </tr>

                                        
                    ';
            
        }

    }

    $output .= '</tbody>
    </table>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>';

}




$dompdf->loadHtml($output);


$dompdf->setPaper('A4', 'portrait'); 
 

$dompdf->render(); 

 ob_end_clean();

 $dompdf->stream('my.pdf', array('Attachment' => 0));



?>


