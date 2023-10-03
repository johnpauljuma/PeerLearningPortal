<?php 
include './includes/header.php';
include './includes/sidebar.php';
include './includes/footer.php';

session_start();

if (isset($_SESSION['std_id'])) {
    // The student is logged in, and their ID is stored in the session
    $loggedInStudentID = $_SESSION['std_id'];
} else {

    echo 'student ID does not exist!';
    // The student is not logged in, or the session has expired
    header("Location: login.php");
    //exit;
}

// Database configuration
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "student";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $course = $_POST["course"];
    $major = $_POST["major"];
    $year = $_POST["year"];
    $semester_year = $_POST["semester_year"];
    $concentration = $_POST["concentration"];
    $role = $_POST["role"];
    $date = $_POST["application_date"];

    
     // Prepare and execute SQL query to insert data into the appropriate table
     if ($role === "tutee") {
        $sql = "INSERT INTO tutee_applications (Student_ID, Full_Name, Course, Major, Year, Semester, Concentration, Role, Date)
                VALUES ('$student_id', '$name', '$course', '$major', '$year', '$semester_year', '$concentration', '$role', '$date')";
    } elseif ($role === "tutor") {
        $sql = "INSERT INTO tutor_applications (Student_ID, Full_Name, Course, Major, Year, Semester, Concentration, Role, Date)
                VALUES ('$student_id', '$name', '$course', '$major', '$year', '$semester_year', '$concentration', '$role', '$date')";
    } else {
        // Handle the situation when the role is neither "tutee" nor "tutor"
        echo "<h2>Error: Invalid Role.</h2>";
        exit; // Exit the script
    }
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Application Submitted successfully!')
        window.location.href = 'index.php';
        </script>";
    } /*else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
else {
    // If the form was not submitted via POST, handle the situation accordingly
    echo "<h2>Error: Form was not submitted.</h2>";
}
}

    // Fetch course codes from the 'courses' table
    $courseCodes = array();
    $query = "SELECT course_code FROM courses";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseCodes[] = $row["course_code"];
        }
    }

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Peer Learning Platform Application</title>
    <style>
    body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    /* Style input text fields */
    input[type="text"], option{
        height: 30px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        margin-right: 2em;
        
    }

    /* Style select dropdowns */
    select {
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        margin-right: 2em;
        width: fit-content;

    }

    /* Style labels */
    label {
        font-weight: bold;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #0C4E92;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 3px;
        cursor: pointer;
        width: fit-content;
    }

    /* Change submit button color on hover */
    input[type="submit"]:hover {
        background-color: blue;
    }

    /* Style the container */
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: auto;
        margin-top: 2em;
        padding: 1em;
        height: fit-content;
        width: 70%;
        border-radius: 10px;
        box-shadow: 0 0 5px 0;
        background-color: white;
    }
</style>

</head>
<body>
    <center><h1>Peer Learning Platform Application</h1></center>
    <div class="container">
    
    <form action="apply.php" method="post">
        <!-- Student ID -->
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" value="<?php echo $loggedInStudentID; ?>" required >

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="first name & last name" required>
        
        <br><br>

        <label for="course">Course Code:</label>
            <select id="course" name="course" required>
                <?php
                // Populate the dropdown with course codes from the 'courses' table
                foreach ($courseCodes as $code) {
                    echo "<option value='$code'>$code</option>";
                }
                ?>
            </select>

        <label for="major">Major:</label>
        <input type="text" id="major" name="major" required>

        
        <label for="year">Year of Study:</label>
        <select id="year" name="year" required>
            <option value="freshman">Freshman</option>
            <option value="sophomore">Sophomore</option>
            <option value="junior">Junior</option>
            <option value="senior">Senior</option>
        </select>
        
        <br><br>

        <label for="semester_year">Semester/Year:</label>
        <select id="semester_year" name="semester_year" required>
            <option value="fall_2023">Fall 2023</option>
            <option value="spring_2024">Spring 2024</option>
            <option value="summer_2024">Summer 2024</option>
        </select>

        
        <label for="concentration">Concentration:</label>
        <input type="text" id="concentration" name="concentration" required>

        
        <br><br>

        <label for="role">User Role:</label>
            <select id="role" name="role">
                <option value="tutee">Tutee</option>
                <option value="tutor">Tutor</option>
            </select>

                <!-- Current Date -->
            <label for="application_date">Application Date:</label>
            <input type="date" id="application_date" name="application_date" readonly value="<?php echo date('Y-m-d'); ?>" required>


            <br><br>

        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
