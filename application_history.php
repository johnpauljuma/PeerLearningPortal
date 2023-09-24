<?php 
include './includes/header.php';
include './includes/sidebar.php';
include './includes/footer.php';
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
    <center><h1>Courses Offered</h1></center>
    <div class="table_container">
        <table>
            <th>Date</th>
            <th>Course</th>
            <th>Status</th>

            <tr>
                <td>09/12/2022</td>
                <td>APT2030: Introduction to programming</td>
                <td> Matched</td>
            </tr>
        </table>
    </div>
</body>
</html>