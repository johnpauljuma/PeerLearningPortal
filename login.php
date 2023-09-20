<?php
session_start();
$message = "";

if (isset($_POST['submit'])) {
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'files') or die('Unable To connect');
    $result = mysqli_query($con, "SELECT * FROM tblemployees WHERE EmpId='" . $_POST["EmpId"] . "'");

    if ($row = mysqli_fetch_array($result)) {
        // Verify the password
        if (password_verify($_POST["password"], $row["password"])) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["EmpId"] = $row['EmpId'];
            $_SESSION['employee_name'] = $row['FirstName'] . ' ' . $row['LastName'];

            // Redirect to the index.php page or any other desired page
            header("Location: index.php");
        } else {
            $message = "Invalid Password!";
        }
    } else {
        $message = "Invalid Username!";
    }

    mysqli_close($con);
}
?>


<html>
<head>  
<title>User Login</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 20%;
            margin: 0 auto;
            margin-top: 1em;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 3%;
            border-style: outset;
            background-color: white;
            justify-content: center;
            align-content: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex; 
            flex-direction: column;
            align-items: center;
            background-color: orange;

        }

        .message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 75%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
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
            width: 75%;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: blue;
        }
        form{
            margin: 0 auto;
            justify-content: center;
            display: block;
            width: 20em;
            align-content: center;
            align-items: center;
            max-width: 300px; 
            text-align: center; 

        }
        .fpw{
            width: 100%;
            margin: 0 auto;
            margin-top: 2em;
            text-decoration: none;
            
        }
        a{
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    
<div class="container">
        
<form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <br>
        <div><h3>Login</h3></div>
        <input type="text" name="EmpId" placeholder="Student ID">
        <br>
        <br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="submit" name="submit" value="Login">
        <div class="fpw"><a href="forgotpassword.php">Forgot Password?</a></div>
        <div class="fpw">Don't have an account? Register   <a href="registration.php">here.</a></div>
</form>

</div>

</body>
</html>


