<?php
include "db.php";
$message = "";

$depCode = $_GET['id'];

//Check if naa na ka associate lain table?
$query = "SELECT COUNT(*) as empCount FROM employees WHERE depCode = '$depCode'";
$reu = $con->query($query);
$row = $reu->fetch_assoc(); //kani ge gamit kay isa raman 

if ($row['empCount'] > 0) {
    $message = "Cannot Delete. There are employees in this department. Please reassign them before deleting.";
} else {
    $query = "Delete FROM departments WHERE depCode='$depCode'";
    $reu = $con->query($query);

    $message = "Successfully deleted";
} 
?>


<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 400px;
        margin: 0 auto;
    }

    .message {
        margin-top: 20px;
        text-align: center;
        background-color: blueviolet;
        color: white;
        font-weight: bold;
        font-family: sans-serif;
        padding: 20px;
        border-radius: 5px;
        
    }
    
    .button{
        margin: 10px;
        font-family: sans-serif;
        text-decoration: none;
        font-weight: bold;
        
    }
</style>

<div class="container">
    <div class="message"> <?php echo $message ?> </div>
</div>

<div class="container">
    <a href="dept.php" class="button">Back</a>
</div>