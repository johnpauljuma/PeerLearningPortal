<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';
    
    // Retrieve parameters from the URL
    $course_code = $_GET['course_code'];
    $course_name = $_GET['course_name'];
    $school = $_GET['school'];
    $id = $_GET['id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $school = $_POST['school'];
    
        // SQL prepared statement => update the course details
        $sql = "UPDATE courses SET Course_code = ?, Course_name = ?, School = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("sssi", $courseCode, $courseName, $school, $id);
            if ($stmt->execute()) {
                echo "<script>
                alert('Course updated successfully!')
                window.location.href = 'manage_courses.php';
                </script>";
            } 
            else {
                // Update failed
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } 
        else {
            // Prepare statement failed
            echo "Error: " . $conn->error;
        }
    
        // Close the database connection
        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Form Container */
        .form-container {
            width: 300px;
            margin: 0 auto;
            margin-top: 2em;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            background-color: #f9f9f9;
            
        }

        /* Input Fields */
        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            font-family: tahoma;
        }

        /* Add Button */
        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: tahoma;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: yellow;
            color: blue;
            box-shadow: 0 0 5px 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Course</h2>
        <form method="post" action="edit_course.php">
            <label for="course_code">Course Code</label>
            <input type="text" class="form-input" id="courseCode" name="course_code" value="<?php echo $course_code; ?>">

           <label for="course_name">Course name</label>
            <input type="text" class="form-input" id="courseName" name="courseName" value="<?php echo $course_name; ?>">
            <label for="school">School</label>
            <input type="text" class="form-input" id="school" name="school" value="<?php echo $school; ?>">

            <button type="submit" class="add-button">Update</button>
        </form>
    </div>

    <?php include 'admin_footer.php'?>
</body>
</html>
