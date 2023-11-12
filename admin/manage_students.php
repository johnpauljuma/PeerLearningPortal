<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';

    // Fetch data from the registration table
    $sql = "SELECT * FROM tblregistration";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>

    <script src="https://kit.fontawesome.com/3dbba9b848.js" crossorigin="anonymous">
    </script>

    <style>           
       body{
            font-family: tahoma;
            margin-left: 13%; 
            margin-bottom: 2em;
        }

        .main-content {
            display: flex;
            margin-left: 14%;
            margin: auto;
            
            margin-bottom: 2em;
            
        }

        .table_container{
            width: 80%;
            margin: auto;
        }
        table{
            width: 100%;
            box-shadow: 0 0 5px 0;
            border-collapse: collapse;
            margin-top: 2em;
        }
        .tablehead{
            background-color: black;
            color: white;
            padding-top: 2px;
            padding-bottom: 2px;
            margin: 2px;
            text-align: left;
        }
        td, th{
            padding: 10px 20px 10px 20px;
            border-bottom: solid 1px grey;
        }
        td button{
            font-size: 16px;
            font-family: tahoma;
            border: 0;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 5px 0 0 blue;
        }

        button:hover {
            background: greenyellow;
            cursor: pointer;
            
        }
        
        </style>
</head>
<body>
<center><h2>Manage Student Information</h2></center>
<div class="main-content">
   
    <div class="table_container">
        <table>
            <tr class="tablehead">
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Drop</th>
            </tr>
    
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Student_ID"] . "</td>";
                echo "<td>" . $row["Full_Name"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td><a href='edit_student_info.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "<td><button onclick='deleteCourse(" . $row["id"] . ")'>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
        </table>
    </div>
</div>

<script>
    function deleteCourse(id) {
        if (confirm('Are you sure you want to delete this Student?')) {
            window.location.href = 'delete_student.php?id=' + id;
        }
    }
</script>

</body>
</html>