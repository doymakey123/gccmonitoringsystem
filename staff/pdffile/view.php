<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$connect = mysqli_connect("localhost", "root", "", "db_gcc");

$query = "SELECT * FROM tbl_record";
$result = mysqli_query($connect, $query);

?>

<table>
    <tr>
        <th> ID </th>
        <th> Name</th>
        <th> Contact </th>
        <th> Address </th>
    </tr>

    <?php

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

?>


    <tr>
        <td> <?php echo $row['id']; ?></td>
        <td> <?php echo $row['stud_id'];  ?></td>
        <td> <?php echo $row['time_inn'];  ?></td>
        <td> <?php echo $row['time_out'];  ?></td>
    </tr>
    <img src="../../../../../xampp/htdocs/gcc/backup_sql/" alt="">
    <img src="../../../../../xampp/mysql/bin/mysqldump.exe" alt="">


<?php

    }
}

?>

</table>
    
</body>
</html>