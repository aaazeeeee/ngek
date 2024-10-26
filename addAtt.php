<?php
include "db.php";
$message = "";
$employee = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attRN = $_POST['attRN'];
    $empID = $_POST['empID'];
    $attDate = $_POST['attDate'];
    $attTimeIn = $_POST['attTimeIn'];
    $attTimeOut = $_POST['attTimeOut'];
    $attStat = $_POST['attStat'];

    if ($attRN == "" || $attDate == "") {
        $message = "Fill all Fields";
    } else {
        $query = "SELECT * FROM attendance WHERE attRn='$attRN'";
        $reu = $con->query($query);

        if ($reu->num_rows > 0) {
            $message = "Attendance Number already existed";
        } else {
            $query = "INSERT INTO Attendance (attRN, empID, attDate, attTimeIn, attTimeOut, attStat) VALUES ($attRN, $empID, '$attDate', '$attTimeIn', '$attTimeOut', '$attStat')";
            $reu = $con->query($query);
            $message = "Recorded Successfully";
        }
    }
}

$query = "SELECT * FROM Employees";
$reu = $con->query($query);

if ($reu->num_rows > 0) {
    while ($row = $reu->fetch_assoc()) {
        $employee[] = $row;
    }
}









?>


<style>
    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
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
        font-family: sans-serif;
    }

    .datetime {
        width: 147px;
    }
    .message {
        font-weight: bold;
        color: red;
        text-align: center;
        margin-bottom: 10px;
    }

</style>

<h1>Record Attendance</h1>

<div class="message">
    <?php echo $message ?>
</div>

<form method="POST" class="form">
    <div class="container">
        <span>Attendance Record Number: </span>
        <input type="number" name="attRN">
    </div>

    <div class="container">
        <span>Employee's ID Number:</span>
        <select name="empID" class="datetime">
            <?php foreach ($employee as $row): ?>

                <option value="<?php echo $row['empID'] ?>"> <?php echo $row['empFname'] ?></option>

            <?php endforeach; ?>
        </select>
    </div>

    <div class="container">
        <span>Attendance Record Date:</span>
        <input type="date" name="attDate" class="datetime">
    </div>

    <div class="container">
        <span>Attendance Time In:</span>
        <input type="time" name="attTimeIn" class="datetime">
    </div>

    <div class="container">
        <span>Attendance Time Out:</span>
        <input type="time" name="attTimeOut" class="datetime">

    </div>

    <div class="container">
        <span>Attendance Status</span>
        <select class="datetime" name="attStat">
            <option>Select Status</option>
            <option>Cancel</option>
            <option>Not</option>
        </select>
    </div>

    <div class="btn">
        <input class="button" type="submit" value="Record Attendance">
    </div>

    <div class="btn">
        <a href="att.php" class="button">Back</a>
    </div>

</form>