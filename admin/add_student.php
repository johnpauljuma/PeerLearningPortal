<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';

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

        // Check if student ID exists in tblregistration
        $check_query = "SELECT * FROM tblregistration WHERE Student_ID = '$student_id'";
        $result = $conn->query($check_query);
        
        // Student ID exists, proceed with the insert query
        if ($result->num_rows > 0) {
            
            if ($role === "tutee") {
                $sql = "INSERT INTO tutee_applications (Student_ID, Full_Name, Course, Major, Year, Semester, Concentration, Role, Date)
                        VALUES ('$student_id', '$name', '$course', '$major', '$year', '$semester_year', '$concentration', '$role', '$date')";
            } elseif ($role === "tutor") {
                $sql = "INSERT INTO tutor_applications (Student_ID, Full_Name, Course, Major, Year, Semester, Concentration, Role, Date)
                        VALUES ('$student_id', '$name', '$course', '$major', '$year', '$semester_year', '$concentration', '$role', '$date')";
            } 
            else {
                // Handle the situation when the role is neither "tutee" nor "tutor"
                echo "<h2>Error: Invalid Role.</h2>";
                exit; // Exit the script
            }
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                alert('Student Added successfully!')
                window.location.href = 'add_student.php';
                </script>";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
         
               }
        } 
        else {
            // Student ID doesn't exist, display a pop-up showing the error
            echo "<script>alert('Error: Student ID doesn't exist.');</script>";
        }
    }
    else {
        // If the form was not submitted via POST, handle the situation accordingly
        echo $conn->error;
    }

    // Close the database connection
    $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tute/Tutor Application</title>
    <style>
    body{
        font-family: Tahoma;
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
        border: solid;
        padding: 5px 10px;
        box-shadow: 0 0 5px 0;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        font-family: tahoma;
        border-radius: 3px;
        cursor: pointer;
        width: fit-content;
    }

    /* Change submit button color on hover */
    input[type="submit"]:hover {
        background-color: blue;
        color: white;
        border: solid blue;
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
    <center><h1>Tute/Tutor Application</h1></center>
    <div class="container">
    
    <form action="add_student.php" method="post">
        <!-- Student ID -->
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="first name & last name" required>
        
        <br><br>

        <label for="course">Course:</label>
        <select id="course" name="course" required>
            <option value="computer_science">Computer Science</option>
            <option value="engineering">Engineering</option>
            <option value="biology">Biology</option>
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
        <input type="submit" value="ADD">
    </form>
    </div>
</body>
</html>
