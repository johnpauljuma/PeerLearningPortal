<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include './includes/configuration.php';
    session_start();
    $message = "";

    if (count($_POST) > 0) {
        
        $std_id = $_POST["std_id"];
        $password = $_POST["password"];
        
        // Retrieve the hashed password from the database based on the provided username or email
        $result = mysqli_query($conn, "SELECT Student_ID, Full_Name, Email, password FROM tblregistration WHERE Student_ID='" . $std_id . "'");
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            // If Password verification is successful
            // Store the student ID in the session
            $_SESSION['id'] = $row['id'];
            $_SESSION['std_id'] = $row['Student_ID'];
            $_SESSION['full_name'] = $row['Full_Name'];
            $_SESSION['email'] = $row['Email'];
            echo "<script>
                alert('Login successful!')
                window.location.href = 'index.php';
            </script>" . $_SESSION['full_nane'];
            // After successful login
            
        } else {
            $message = "Invalid Username or Password!";
        }
    }

?>

<html>
<head>  
<title>User Login</title>
<style>

        .container {
            width: 25%;
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
        <input type="text" name="std_id" placeholder="Student ID">
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
