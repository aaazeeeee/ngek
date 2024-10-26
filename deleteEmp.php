<?php
include "db.php";

$empID = $_GET['id'];

$query = "Delete FROM employees WHERE empID='$empID'";
$reu = $con->query($query);

echo "Successfully deleted";

?>