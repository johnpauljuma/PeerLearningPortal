<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
            <th>Student ID</th>
            <th>Name</th>
            <th>Course Code</th>
            <th>Major</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Concentration</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Status</th>

            <?php
            // Display tutee applications
            while ($row = $tuteeResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Student_ID"] . "</td>";
                echo "<td>" . $row["Full_Name"] . "</td>" ;
                echo "<td>" . $row["Course"] . "</td>";
                echo "<td>" . $row["Major"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["Semester"] . "</td>";
                echo "<td>" . $row["Concentration"] . "</td>";
                echo "<td>Tutee</td>";
                echo "<td><a href='edit_tutee_application.php'>Edit</a></td>";
                echo "<td>Matched</td>";
                echo "</tr>";
            }

            // Display tutor applications
            while ($row = $tutorResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Student_ID"] . "</td>";
                echo "<td>" . $row["Full_Name"] . "</td>" ;
                echo "<td>" . $row["Course"] . "</td>";
                echo "<td>" . $row["Major"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["Semester"] . "</td>";
                echo "<td>" . $row["Concentration"] . "</td>";
                echo "<td>Tutor</td>";
                echo "<td><a href='edit_tutor_application.php'>Edit</a></td>";
                echo "<td>Matched</td>";
                echo "</tr>"; 
            }
            ?>
        </table>
    </div>
</body>
</html>
