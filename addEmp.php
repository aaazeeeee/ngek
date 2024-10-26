<?php

include "db.php";
$message = "";

$department = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empID = $_POST['empID'];
    $depCode = $_POST['depCode'];
    $empFname = $_POST['empFname'];
    $empLname = $_POST['empLname'];
    $empRPH = $_POST['empRPH'];

    if ($empID == "" || $empFname == "" || $empLname == "" || $empRPH == "") {
        $message = "Fill all fields";
    } else {
        $query = "SELECT * FROM employees WHERE empID='$empID'";
        $reu = $con->query($query);

        if ($reu->num_rows > 0) {
            $message = "Employee ID already existed";
        } else {
            $query = "INSERT INTO Employees (empID,depCode,empFname,empLname,empRPH) VALUES ($empID, $depCode, '$empFname', '$empLname', $empRPH)";
            $reu = $con->query($query);
            $message = "Added Successfully";
        }
    }

}

$query = "SELECT * FROM Departments";
$reu = $con->query($query);

if ($reu->num_rows > 0) {
    while ($row = $reu->fetch_assoc()) {
        $departments[] = $row;
    }
}



?>

<style>
    h1 {
        text-align: center;
    }

    .container {
        display: flex;
        flex: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .form {
        width: 400px;
        margin: 0 auto;
    }

    .message {
        font-weight: bold;
        color: red;
        text-align: center;
        margin-bottom: 10px;
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
    .menu{
        width: 147px;
    }
</style>

<form method="POST" class="form">
    <h1>Add an Employee</h1>

    <div class="message">
        <?php echo $message ?>
    </div>

    <div class="container">
        <span>Employee ID</span>
        <input type="number" name="empID">
    </div>

    <div class="container">
        <span>Department ID</span>
        <select name="depCode" class="menu">
            <?php foreach ($departments as $row): ?>
                <option value="<?php echo $row['depCode']?>"> <?php echo $row['depName']?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="container">
        <span>Employee First Name</span>
        <input type="text" name="empFname">
    </div>

    <div class="container">
        <span>Employee Last Name</span>
        <input type="text" name="empLname">
    </div>

    <div class="container">
        <span>Rate Per Hour</span>
        <input type="text" name="empRPH">
    </div>

    <div class="btn">
        <input class="button" type="submit" value="Add Employee">
    </div>

    <div class="btn">
        <a href="emp.php" class="button">Back</a>
    </div>
</form>