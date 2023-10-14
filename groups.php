<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include './includes/header.php';
    include './includes/sidebar.php';
    include './includes/footer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student | groups</title>
    <style>
        .container{
            height: 80%;
            padding: 10px;
            
        }
        .content1{
            width: fit-content;
            max-width: 100%;
            margin: 0;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            padding: 1px 10px 1px 10px;
            box-shadow: 0 0 5px 0;
            
        }
        .content2{
            padding: 10px;
        }
    </style>
</head>
<body>
    <center><h2>Groups</h2></center>
    <div class="container">
        <div class="content1">
            <p>You have not been matched to any group yet!</p>
        </div>
        <div class="content2">
            <p>Your group will show here...</p>
        </div>
    </div>
</body>
</html>