<?php
include "db.php";


$total = 0;
$employee = null;
$records = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empID = $_POST['empID'];

    $query = "SELECT * FROM Employees INNER JOIN Departments ON Departments.depCode = Employees.depCode WHERE empID = $empID";
    $reu = $con->query($query);

    if ($reu->num_rows > 0) {
        $employee = $reu->fetch_assoc();
    }

    $query = "SELECT * FROM attendance WHERE empID = $empID";
    $rows = $con->query($query);
    if ($rows->num_rows > 0) {
        while ($row = $rows->fetch_assoc()) {
            $timeIn = new DateTime($row['attTimeIn']);
            $timeOut = new DateTime($row['attTimeOut']);
            $totalHours = $timeIn->diff($timeOut);
            $row['totalHours'] = $totalHours;
            $total = $total + $totalHours->h;
            // $total = $total + $totalHours->h + ($totalHours->i * 0.1);
            $records[] = $row;
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Monitoring (Employee)</title>
</head>

<body>

    <style>
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

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>



    <div>
        <div class="container">
            <form method="POST">
                <span>Input Employee #:</span>
                <input type="text" name="empID">
            </form>


            <a href="index.php">Back to Menu</a>
        </div>

        <?php if ($employee) : ?>

            <div class="container">
                <div>
                    <span>Name:</span>
                    <span><?php echo $employee['empFname'] . ' ' . $employee['empLname'] ?></span>
                </div>
                <div>
                    <span>Department: </span>
                    <span><?php echo $employee['depName']; ?> </span>

                </div>
            </div>

            <div>
                <table>
                    <tr>
                        <th>Record #:</th>
                        <th>Emp ID</th>
                        <th>Date/Time In </th>
                        <th>Date/Time Out</th>
                        <th>Total</th>
                    </tr>

                    <tbody>
                        <?php foreach ($records as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $row['attRN']; ?>
                                </td>
                                <td>
                                    <?php echo $row['empID']; ?>
                                </td>
                                <td>
                                    <?php echo $row['attDate'] . ' ' . $row['attTimeIn'] ?>
                                </td>
                                <td>
                                    <?php echo $row['attDate'] . ' ' . $row['attTimeOut'] ?>
                                </td>
                                <td>
                                    <?php echo $row['totalHours']->h; ?>.<?php echo $row['totalHours']->i; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="container">
                <div class="">
                    <span>Rate Per Hour: <?php echo $employee['empRPH']; ?></span>
                </div>
                <div>
                    <span>Total Hours Worked: <?php echo $total; ?></span>
                </div>
            </div>

            <div class="container">
                <div class="">
                    <span>Salary: <?php echo $total * $employee['empRPH']; ?></span>
                </div>

                <div class="">
                    <span> Date Generated: <?php echo date("Y-m-d"); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>