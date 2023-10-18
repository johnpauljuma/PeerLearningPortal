<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include 'admin_header.php';
    include 'admin_sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <style>
        .indexh2{
            display: block;
            column-span: 2;
            background-color: grey;
            width: 100%;
            height: fit-content;
        }
        .home{
            display: flex;
            justify-content: center;
            height: 70%;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px 0;
           
        }
        .home1{
            display: inline-flex;
            height: inherit;
            width: 50%; 
            margin: auto;
            margin-left: 5px;
            background-color: orange;

        }
        @media screen and (max-width: 768px) {
            body{
                height: 100vh;
                width: 100%;
                padding: 0;
                margin: auto;
            }
            .sidebar{
                overflow: hidden;
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="home">
        <div class="indexh2"><h2>Welcome home</h2></div>
        <div class="home1"></div>
        <div class="home1"></div>
    </div>
<?php include 'admin_footer.php'?>
</body>
</html>