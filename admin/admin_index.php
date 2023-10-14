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
<?php include 'admin_footer.php'?>
</body>
</html>