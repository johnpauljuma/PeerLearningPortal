<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';

    // Check if the form is submitted
    if (isset($_POST['register'])) {

        // Get data from the form
        $std_id = $_POST['std_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "<script>
                    alert('Passwords do match!')
                    window.location.href = 'registration.php';
                </script>";
            exit();
        }

        // Validate the email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit();
        }

        // Check if the student ID already exists in the database
        $checkQuery = "SELECT * FROM tblregistration WHERE Student_ID = '$std_id'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // Student ID already exists, return an error
            echo "<script>
                    alert('Student ID already exists! Please check the student ID and try again...')
                    window.location.href = 'register_student.php';
                </script>";
            exit();
        }

        // Hash the password for security (you should use a stronger hashing method in production)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create an SQL insert query
        $sql = "INSERT INTO tblregistration (Student_ID, Full_Name, Email, Password) VALUES ('$std_id', '$full_name', '$email', '$hashed_password')";

        // Perform the insert operation
        if (mysqli_query($conn, $sql)) {
            // Registration successful
            //$_SESSION['std_id'] = $std_id;
            echo "<script>
            alert('Student Registered Successfully!')
            window.location.href = 'manage_students.php';
            </script>";
        } else {
            // Registration failed
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Learning Portal Registration</title>
    <style>
        
        body {
            font-family: tahoma;
            margin: 0;
            margin-top: 100px;
            padding: 0;
        }
        .container {
            width: 30%;
            height: 80%;
            margin:  auto;
            margin-bottom: 2em;
            margin-top: 120px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            background-color: #ccc;
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
            border: solid 2px grey;
            border-radius: 5px;
        }
        button[type="submit"] {
            
            float: right;
            padding: 5px 10;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 18px;
            font-family: tahoma;
        }
        button[type="submit"]:hover{
            background-color: blue;
            color: white;
            cursor: pointer;
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
        <form action="register_student.php" method="POST">
        <label for="full_name">Student ID:</label>
            <input type="text" id="std_id" name="std_id" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required onblur="validateEmail(this)">


            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required onblur="validatePassword(this)">

            <div><button type="submit" name="register">Register</button></div>

        </form>            
        
    </div>

   
</body>
</html>
