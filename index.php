<?php 
include './includes/header.php';
include './includes/sidebar.php';
include './includes/footer.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>
      .container{
        height: 100vh;
        width: 100%;
        max-width: 100%;
        display: flex;
        justify-content: center;
        padding: 10px;
        padding-bottom: 10px;
        box-shadow: 0 0 5px 0;
        
      }
      .content{
            height: 100%;
            width: 25%;
            display: inline-flex;
            margin-bottom: 10px;
            box-shadow: 0 0 5px 0;
            background-color: orangered;
      }
    </style>
</head>

<body>

    <center><h1 style="box-shadow: 0 0 5px 0;">Welcome Home</h1></center>

    <div class="container">
        <div class="content"></div>
        <img src="./images/home3.png" alt="">
        <div class="content"></div>
        
    </div>
    

</body>

</html>