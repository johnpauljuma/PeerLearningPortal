<?php include 'admin_header.php'?>
<?php include 'admin_sidebar.php'?>
<?php include 'admin_footer.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | manage courses</title>
    <style>
        .container{
            height: fit-content;
            width: fit-content;
            margin: auto;
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
        
        table{
            margin: auto;
            margin-top: 2em;
            padding: 10px;
            box-shadow: 0 0 3px 0;
        }
        th{
            padding: 5px;
            text-align: left;
            box-shadow: 0 0 5px 0;

        }
        td{
            border: 1px;
            margin: 5px;
            text-align: left;
            padding: 10px;
        }
        span{
            color: red;
            margin-left: 0;
            margin-right: 2em;
        }
        h3{
            margin: 0;
            margin-top: 10px;
            margin-bottom: -10px;

        }
        input[type="search"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            max-width: 300px; 
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            background-color: #fff;
            background-image: url('search-icon.png'); 
            background-position: 10px 10px;
            background-repeat: no-repeat;
            text-indent: 30px;
            float: right;
            display: flex;
            right: 0;
        }
    </style>
</head>
<body>
    
        <center><h2>Manage courses</h2></center>
    <div class="container">
        <center><h3>Course Details</h3></center>
        <input type="search" name="search" placeholder="Enter corese code to search">
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>School</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>APT2030</td>
                <td>Introduction To Programming</td>
                <td>School of Science and Technology</td>
                <td><a href="#">Edit</a></td>
                <td><input type="submit" value="Delete"></td>
            </tr>
            <tr>
                <td>APT2030</td>
                <td>Introduction To Programming</td>
                <td>School of Science and Technology</td>
                <td><a href="#">Edit</a></td>
                <td><input type="submit" value="Delete"></td>
            </tr>
            <tr>
                <td>APT2030</td>
                <td>Introduction To Programming</td>
                <td>School of Science and Technology</td>
                <td><a href="#">Edit</a></td>
                <td><input type="submit" value="Delete"></td>
            </tr>
        </table>
    </div>
</body>
</html>