<?php 
include './includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            
            align-content: center;
            flex-direction: column;
            margin: 0 auto;

        }
        .container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 18%;
            height: 60%;
            border-radius: 10px;
            border-style: outset;
            box-shadow: 0 0 20px 5px;
            margin: 0 auto;
            margin-top: 3em;
            padding: 10px;

        }
        .header{
            margin: auto;
            margin-bottom: 10%;
            
        }
        input{
            border: solid 1px;
            width: 50%;
            margin: auto;
            margin-bottom: 10px;
            margin-top: 0;
            width: 70%;
            height: 40px;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #0C4E92;
            color: white;
            border: none;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 3px;
            cursor: pointer;
            width: 30%;
            margin-top: 10%;
        }

        input[type="submit"]:hover
         {
            background-color: blue;
        }
        .backtologin{
            margin: auto;
           
            display: flex;
            justify-content: center;
        }
        a{
            margin: auto;
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="header"><h3>Reset Your Password!</h3></div>
        <input type="text" placeholder="Student ID">
        <input type="text" placeholder="new password">
        <input type="text" placeholder="confirm new password">
        <input type="submit" value="Reset">
        <div class="backtologin"><a href="login.php">Back to login</a></div>
    </div>
</body>
</html>