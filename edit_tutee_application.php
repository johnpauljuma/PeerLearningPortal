<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    session_start();

    include './includes/header.php';
    include './includes/sidebar.php';
    include './includes/configuration.php';

     // Get the user's ID from the session
     $user_id = $_SESSION['std_id']; // Use the student ID from the session
     $fullName = $_SESSION['full_name'];

    $tuteeSQL = "SELECT * FROM tutee_applications WHERE Student_ID = $user_id";
    $tuteeResult = $conn->query($tuteeSQL);

    if ($tuteeResult->num_rows > 0) {
        $row = $tuteeResult->fetch_assoc();

        $course = $row['Course'];
        $major = $row['Major'];
        $year = $row['Year'];;
        $semester = $row['Semester'];
        $concentration = $row['Concentration'];
        $role = $row['Role'];
    }
     

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $new_course = $_POST['course'];
        $new_major = $_POST['major'];
        $new_year = $_POST['year'];
        $new_semester = $_POST['semester'];
        $new_concentration = $_POST['concentration'];
        $new_role = $_POST['role'];
        $date_updated = $_POST['date_updated'];
    
        if ($new_role == 'tutee') {
            // Check if the student ID already exists in the tutee table
            $tuteeCheckQuery = "SELECT * FROM tutee_applications WHERE Student_ID = ?";
            $tuteeStmt = $conn->prepare($tuteeCheckQuery);
            $tuteeStmt->bind_param("s", $user_id);
            $tuteeStmt->execute();
            $tuteeResult = $tuteeStmt->get_result();
    
            if ($tuteeResult->num_rows > 0) {
                // Student ID already exists, perform the update
                // SQL prepared statement => update the course details
                $tuteeUpdateQuery = "UPDATE tutee_applications SET Course = ?, Major = ?, Year = ?, Semester = ?, Concentration = ?, Role = ?, Date_updated = ? WHERE Student_ID = ?";
                $tuteeStmt = $conn->prepare($tuteeUpdateQuery);
                
                $tuteeStmt->bind_param("ssssssss", $new_course, $new_major, $new_year, $new_semester, $new_concentration, $new_role, $date_updated, $user_id);
                if ($tuteeStmt->execute()) {
                    echo "<script>
                            alert('Application Details Updated Successfully!')
                            window.location.href = 'application_history.php';
                            </script>";
                } else {
                    // Update failed
                    echo "Error: " . $tuteeStmt->error;
                }
                $tuteeStmt->close();
            } else {
                echo "Error: Student ID not found.";
            }
        } 
        elseif ($new_role == 'tutor') {
            $tutorInsertQuery = "INSERT INTO tutor_applications (Student_ID, Full_Name, Course, Major, Year, Semester, Concentration, Role, Date, Date_updated) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $tutorStmt = $conn->prepare($tutorInsertQuery);
            $tutorStmt->bind_param("ssssssssss", $user_id, $fullName, $new_course, $new_major, $new_year, $new_semester, $new_concentration, $new_role, $date, $date_updated);
            if ($tutorStmt->execute()) {
                echo "<script>
                        alert('Application Details Updated Successfully!')
                        window.location.href = 'application_history.php';
                        </script>";
            } else {
                echo "Error: " . $tutorStmt->error;
            }
            $tutorStmt->close();
        } else {
            // Handle the situation when the role is neither "tutee" nor "tutor"
            echo "<h2>Error: Invalid Role.</h2>";
            exit; // Exit the script
        }
    
        // Close the database connection
        $conn->close();
    }
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Application</title>

    <style>
        form{
            margin: auto;
            padding: 10px 10px 10px 30px;
            width: 30%;
            border-radius: 10px;
            border: solid 2px ;
            box-shadow: 0 0 5px 0;
            background-color: grey;
        }
        label{
            margin: 2px;
            font-size: 18px;
            font-weight: bold;
        }
        select{
            width: fit-content;
            background-color: orange;
        }
        input[type="text"],
            [type="date"],
            select{
            margin-top: 2px;
            font-size: 18px;
            font-family: tahoma;
            height: 30px;
            border-radius: 5px;
            border: solid 1px blue;
            
        }
        input[type="submit"]{
            display: flex;
            font-size: 24px;
            font-family: tahoma;
            padding: 2px;
            margin: auto;
            margin-left: 70%;
            border-radius: 5px;
            box-shadow: 0 0 5px 0;
        }
        input[type="submit"]:hover{
            background-color: blue;
            color: white;
            cursor: pointer;
            box-shadow: 0 0 5px 0 black;

        }
    </style>
</head>
<body>
    <form action="edit_tutee_application.php">
    <label for="student_id">Student ID:</label> 
        <br>
        <input type="text" id="student_id" name="student_id" value="<?php echo $user_id; ?>" required readonly>
        <br><br>
        <label for="name">Full Name:</label> 
        <br>
        <input type="text" id="name" name="name" placeholder="first name & last name" value="<?php echo $fullName; ?>"required readonly>
        <br><br>

        <label for="course">Course Code:</label>
        <br>
        <select id="course" name="course" required>
            <?php
            // Fetch course codes from the 'courses' table
                $courseCodes = array();
                $query = "SELECT Course_code FROM courses";
                $courses_result = $conn->query($query);
                if ($courses_result->num_rows > 0) {
                    while ($row = $courses_result->fetch_assoc()) {
                        $code = $row["Course_code"];
                        echo "<option value='$code' ";
                        if ($code == $course) {
                            echo "selected";
                        }
                        echo ">$code</option>";
                    }
                }
            ?>
    </select>

        <br><br>
        <label for="major">Major:</label>
        <br>
        <input type="text" id="major" name="major" value="<?php echo $major; ?>" required>
        <br><br>
        
        <label for="year">Year of Study:</label>
        <br>
        <select id="year" name="year" value="<?php echo $year; ?>" required>
            <option value="freshman">Freshman</option>
            <option value="sophomore">Sophomore</option>
            <option value="junior">Junior</option>
            <option value="senior">Senior</option>
        </select>
        
        <br><br>

        <label for="semester">Semester/Year:</label>
        <br>
        <select id="semester_year" name="semester" value="<?php echo $semester; ?>" required>
            <option value="fall_2023">Fall 2023</option>
            <option value="spring_2024">Spring 2024</option>
            <option value="summer_2024">Summer 2024</option>
        </select>
        <br><br>
        <label for="concentration">Concentration:</label>
        <br>
        <input type="text" id="concentration" name="concentration" value="<?php echo $concentration; ?>" required>

        
        <br><br>

        <label for="role">User Role:</label>
        <br>
            <select id="role" name="role">
                <option value="tutee">Tutee</option>
                <option value="tutor">Tutor</option>
            </select>

        <br><br>
        <label for="application_date">Date Updated:</label>
        <br>
        <input type="date" id="application_date" name="date_updated" readonly value="<?php echo date('Y-m-d'); ?>" required>

        <br><br>

        <input type="submit" value="Update">

    </form>
</body>
</html>