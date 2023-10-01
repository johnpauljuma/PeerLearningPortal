<?php 
    include './includes/header.php';
    include './includes/sidebar.php';
    include './includes/footer.php';

    //Database configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    //database connection
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the courses table
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | courses</title>
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
            padding: 10px 10px 2px 10px;
        }
    </style>
</head>
<body>
    <center><h1>Courses Offered</h1></center>
    <div class="table_container">
        <table>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>School</th>

            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Course_code"] . "</td>";
                echo "<td>" . $row["Course_name"] . "</td>";
                echo "<td>" . $row["School"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
        </table>
    </div>
</body>
</html>