<?php
include "db.php";

$message = "";
$department = [];

$query = "SELECT * FROM departments";
$reu = $con->query($query);

if ($reu->num_rows > 0) {
    while ($row = $reu->fetch_assoc()) {
        $department[] = $row;
    }
} else {
    $message = "No records Found";
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
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
        <a href="addDept.php" class="text"> Add a Department Here </a>
        <a href="index.php" class="text"> Back to Menu</a>
    </div>

    <table>

        <tr class="thead">
            <th class="head">Code</th>
            <th class="head">Name</th>
            <th class="head">Head</th>
            <th class="head">Tel No. </th>
            <th class="head">Actions</th>
        </tr>

        <?php foreach ($department as $row): ?>
            <tbody>
                <tr>
                    <td> <?php echo $row['depCode']; ?> </td>
                    <td> <?php echo $row['depName']; ?> </td>
                    <td> <?php echo $row['depHead']; ?> </td>
                    <td> <?php echo $row['depTelNo']; ?> </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['depCode'] ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['depCode'] ?>">Delete</a>
                    </td>

                </tr>
            </tbody>
        <?php endforeach; ?>

    </table>

    <?php echo $message ?>


</body>

</html>