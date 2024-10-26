<?php
include "db.php";
$attendance = [];

$query="SELECT * FROM attendance LEFT JOIN employees ON Employees.empID = Attendance.empID";
$reu=$con->query($query);

if($reu->num_rows>0){
    while($row= $reu->fetch_assoc()){
        $attendance [] = $row;
    }
} else{
    $message = "No records found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Recording</title>
</head>
<body>
    
<style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text {
            background-color: black;
            width: 200px;
            color: white;
            margin-top: 10px;
            margin-right: 4px;
            margin-bottom: 10px;
            padding: 3px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>


<div class="container">
    <a href="addAtt.php" class="text">Record Attendance Here</a>
    <a href="index.php" class="text">Back to Menu</a>
</div>

<table>
    <tr>
        <th>Record # </th>
        <th>Employee ID</th>
        <th>Date/Time In</th>
        <th>Date/Time Out</th>
        <th>Action</th>
    </tr>


    <?php foreach($attendance as $row):?>
    <tr>
        <tbody>
            <td><?php echo $row['attRN'];?></td>
            <td><?php echo $row['empID'];?></td>
            <td><?php echo $row['attDate'] . ' ' . $row['attTimeIn'] ;?></td>
            <td><?php echo $row['attDate'] . ' ' . $row['attTimeOut'] ;?></td>
            <td><a href="">Cancel</a></td>
        </tbody>
    </tr>
    <?php endforeach;?>
</table>



</body>
</html>