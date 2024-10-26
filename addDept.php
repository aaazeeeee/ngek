<?php

include "db.php";
$message = "";



//para ig ka submit ni sa form mao ni imo need 
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $depCode = $_POST['depCode'];
    $depName = $_POST['depName'];
    $depHead = $_POST['depHead'];
    $depTelNo = $_POST['depTelNo'];

    //prompt para ig ka fill up ma fill-upan tanan
    if ($depCode == "" || $depName == "" || $depHead == "" || $depTelNo == "") {
        $message = "Fill all Fields";
    }//if department code nag exist na sha 
    else {
        $query = "SELECT * FROM Departments WHERE depCode = '$depCode'";
        $reu = $con->query($query); //need to execute every query 

        //para check if ni exist ang data
        if ($reu->num_rows > 0) {
            $message = "Dep Code already exist";
        } else {
            $query = "INSERT INTO Departments (depCode , depName, depHead, depTelNo) VALUES ($depCode, '$depName', '$depHead', '$depTelNo')";
            $reu = $con->query($query);
            $message = "Added Successfully";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>

<body>


    <style>
        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;

        }

        form {
            width: 500px;
            margin: 0 auto;
        }

        .text {
            font-weight: bold;
            padding: 5px;
        }

        .btn {

            display: flex;
            justify-content: right;
        }

        .button {
            margin-top: 10px;
            background-color: black;
            color: white;
            width: 148px;
            height: 30px;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            text-decoration: none;
        }

        .message {
            font-weight: bold;
            color: red;
            text-align: center;
        }
    </style>



    <form method="POST" class="form">



        <h1>Add a Department</h1>

        <div class="message">
            <?php echo $message ?>
        </div>

        <div class="container">
            <span class="text">Department Code: </span>
            <input type="number" name="depCode">
        </div>

        <div class="container">
            <span class="text">Department Name: </span>
            <input type="text" name="depName">
        </div>

        <div class="container">
            <span class="text">Department Head: </span>
            <input type="text" name="depHead">
        </div>

        <div class="container">
            <span class="text">Department's Tel No.: </span>
            <input type="number" name="depTelNo">
        </div>

        <div class="btn">
            <input type="submit" value="Add" class="button">
        </div>

        <div class="btn">
            <a href="dept.php" class="button">Back</a>
        </div>


    </form>


</body>

</html>