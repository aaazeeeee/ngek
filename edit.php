<?php

include "db.php";
$message = "";
$department = [];

$depCode = "";





//retrieve current details of the department
if (isset($_GET['id'])) {
    $depCode = $_GET['id'];
    $query = "SELECT * FROM departments WHERE depCode = '$depCode'";
    $reu = $con->query($query);

    if ($reu->num_rows > 0) {
        $department = $reu->fetch_assoc();
    }
}


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $depCode = $_POST['depCode'];
    $depName = $_POST['depName'];
    $depHead = $_POST['depHead'];
    $depTelNo = $_POST['depTelNo'];

    //query for UPDATE
    $query = "UPDATE departments SET depCOde = '$depCode', depName = '$depName', depHead = '$depHead', depTelNo= '$depTelNo' WHERE depCode = $depCode ";
    $reu = $con->query($query);
    $message = "Edited Successfully";
}



?>



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
        width: 400px;
        margin: 0 auto;
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
        margin-bottom: 10px;
    }
</style>

<form method="POST" class="form">
    <div>
        <h1>
            Edit Details
        </h1>
    </div>

    <div class="message">
        <?php echo $message ?>
    </div>
    <div class="container">
        <span class="">Department Code: </span>
        <input type="" name="depCode" value="<?php echo $depCode ?>">
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
        <input type="submit" value="Edit" class="button">
    </div>

    <div class="btn">
        <a href="dept.php" class="button">Back</a>
    </div>

</form>