<?php
session_start();
include './includes/header.php';
include './includes/sidebar.php';
include './includes/configuration.php';


$studentID = $_SESSION['std_id']; 
echo $studentID;


// Fetch data from tutee_applications table
$tuteeSQL = "SELECT * FROM tutee_applications WHERE Student_ID = $studentID";
$tuteeResult = $conn->query($tuteeSQL);

// Fetch data from tutor_applications table
$tutorSQL = "SELECT * FROM tutor_applications WHERE Student_ID = $studentID";
$tutorResult = $conn->query($tutorSQL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Applications</title>
    <style>
        .table_container{
            width: fit-content;
            margin: auto;
            justify-content: center;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px 0;
        }
        table{
            border-collapse: collapse;
            padding: 10px;
        }
        th{
            height: 30px;
            box-shadow: 0 0 5px 0;
            padding: 2px 10px 2px 10px;
        }
        td{
            padding: 2px 10px 2px 10px;
        }
    </style>
</head>
<body>
    <center><h1>My Applications</h1></center>
    <div class="table_container">
        <table>
            <th>Application Date</th>
            <th>Course Code</th>
            <th>Role</th>
            <th>Status</th>

            <?php
            // Display tutee applications
            while ($row = $tuteeResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Course"] . "</td>";
                echo "<td>Tutee</td>";
                echo "<td>Matched</td>";
                echo "</tr>";
            }

            // Display tutor applications
            while ($row = $tutorResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Course"] . "</td>";
                echo "<td>Tutor</td>";
                echo "<td>Matched</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
