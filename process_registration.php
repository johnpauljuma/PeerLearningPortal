<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include './includes/configuration.php';

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
                    window.location.href = 'registration.php';
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
            alert('Registration successful!')
            window.location.href = 'login.php';
            </script>";
        } else {
            // Registration failed
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
