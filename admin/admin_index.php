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
        .home{
            display: flex;
            justify-content: center;
            height: 70%;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px 0;
           
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
        <h2>Welcome home</h2>
    </div>
<?php include 'admin_footer.php'?>
</body>
</html>