<?php 
//include './includes/header.php';
//include './includes/sidebar.php';
include './includes/footer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Learning Portal Registration</title>
    <style>
        /* Add your CSS styles here for layout and design */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            margin-top: 100px;
            padding: 0;
        }
        .container {
            width: 30%;
            height: 100vh;
            margin:  auto;
            margin-bottom: 2em;
            margin-top: 100px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            
        }
        form{
            padding: 10px;
            height: fit-content;
            
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"]
        {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }
        select{
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Peer Learning Portal Registration</h2>
        <form action="process_registration.php" method="POST">
        <label for="full_name">Student ID:</label>
            <input type="text" id="std_id" name="std_id" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="user_role">User Role:</label>
            <select id="user_role" name="user_role">
                <option value="tutee">Tutee</option>
                <option value="tutor">Tutor</option>
            </select>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <div><button type="submit" name="register">Register</button></div>

        </form>            
        <div style="float: right; margin: 10px">Already have an account?   <a href="login.php">Login</a></div>
    </div>
</body>
</html>
