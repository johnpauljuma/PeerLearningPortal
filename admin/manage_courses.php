<?php
    include 'admin_header.php';
    include 'admin_sidebar.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin | manage courses</title>
    <style>
        .container {
            height: fit-content;
            width: fit-content;
            margin: auto;
            margin-bottom: 3em;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 0 5px 0;
            border-radius: 10px;
            border-style: outset;
        }
        
        table {
            margin: auto;
            margin-top: 2em;
            padding: 10px;
            box-shadow: 0 0 3px 0;
        }

        th {
            padding: 5px;
            text-align: left;
            box-shadow: 0 0 5px 0;
        }

        td {
            border: 1px;
            margin: 5px;
            text-align: left;
            padding: 10px;
        }

        span {
            color: red;
            margin-left: 0;
            margin-right: 2em;
        }

        h3 {
            margin: 0;
            margin-top: 10px;
            margin-bottom: -10px;
        }

        .h3 {
            display: inline-flex;
            width: 50%;
        }

        .cover {
            display: flex;
            margin-bottom: -20px;
            margin-top: 1em;
        }

        * {
            box-sizing: border-box;
        }

        .form_container {
            display: inline-flex;
            right: 0;
            float: right;
            justify-content: flex-end;
            width: 100%;
            padding: 0;
        }

        form {
            float: right;
            right: 0;
            height: 40px;
            display: flex;
            max-width: 300px;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
            border-radius: 20px 0 0 20px;
            
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    
        <center><h2>Manage courses</h2></center>
    <div class="container">
        <div class="cover">
            <div class="h3"><h3>Course Details</h3></div>
            <div class="form_container">
                <form class="example" action="/action_page.php">
                    <input type="text" placeholder="Search course..." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>School</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Course_code"] . "</td>";
                echo "<td>" . $row["Course_name"] . "</td>";
                echo "<td>" . $row["School"] . "</td>";
                echo "<td><a href='#'>Edit</a></td>";
                echo "<td><button>Delete</butoon></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
            
        </table>
    </div>
    <?php include 'admin_footer.php'?>
</body>
</html>
