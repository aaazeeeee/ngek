<?php
include "db.php";

$employees = [];
$message = "";

$query = "SELECT * FROM Employees INNER JOIN Departments ON Departments.depCode = Employees.depCode ";
$reu = $con->query($query);

if ($reu->num_rows > 0) {
    while ($row = $reu->fetch_assoc()) {
        $employees[] = $row;
    }
} else {
    $message = "No records found";
}














?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Management</title>
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
        <a href="addEmp.php" class="text">Add an Employee Here</a>
        <a href="index.php" class="text"> Back to Menu</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Dept Code</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Rate/Hour</th>
            <th>Action</th>
        </tr>

        <?php foreach ($employees as $row): ?>
            <tr>
                <tbody>
                    <td><?php echo $row['empID']; ?></td>
                    <td><?php echo $row['depCode']; ?></td>
                    <td><?php echo $row['empFname'];
                    ; ?></td>
                    <td><?php echo $row['empLname'];
                    ; ?></td>
                    <td><?php echo $row['empRPH'];
                    ; ?></td>
                    <td>
                        <a href="editEmp.php?id=<?php echo $row['empID'] ?>">Edit</a>
                        <a href="deleteEmp.php?id=<?php echo $row['empID'] ?>">Delete</a>
                    </td>

                </tbody>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $message ?>
</body>

</html>