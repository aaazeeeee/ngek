<?php

include "db.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
</body>
</html>

<style>
    .h1{
        text-align: center;
    }

    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .he{
        background-color: black;
        color: white;
        text-decoration: none;
        text-align: center;
        padding: 5px;
        width: 200px;
        margin-top: 8px;
        border-radius: 3px;
    }
</style>



<h1 class="h1">
    Choose Your Transaction
</h1>

<div class="container">
    <a class="he" href="dept.php">Departments Management</a>
    <a class="he" href="emp.php">Employees Management</a>
    <a class="he" href="att.php">Attendance Recording</a>
    <a class="he" href="monEmp.php">Attendance Monitoring</a>

</div>