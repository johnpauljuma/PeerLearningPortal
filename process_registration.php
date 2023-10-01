<?php
// Check if the form is submitted
if (isset($_POST['register'])) {
    // Define your database connection parameters
    $host = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "student"; 

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get data from the form
    $std_id = $_POST['std_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security (you should use a stronger hashing method in production)
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create an SQL insert query
    $sql = "INSERT INTO tblregistration (Student_ID, Full_Name, Email, Password) VALUES ('$std_id', '$full_name', '$email', '$password')";

    // Perform the insert operation
    if (mysqli_query($conn, $sql)) {
        // Registration successful
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
