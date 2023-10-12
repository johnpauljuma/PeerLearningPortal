<?php 
    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';

    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $school = $_POST['school'];

        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO courses (Course_code, Course_name, School) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $courseCode, $courseName, $school);
            if ($stmt->execute()) {
                echo "<script>
                alert('Course added successfully!')
                window.location.href = 'add_course.php';
                </script>";
            } else {
                // Registration failed
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
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
        }

        /* Add Button */
        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Course</h2>
        <form method="post" action="add_course.php">
            
            <input type="text" class="form-input" id="courseCode" name="courseCode" placeholder="Course Code" required>

           
            <input type="text" class="form-input" id="courseName" name="courseName" placeholder="Course Name" required>

            <input type="text" class="form-input" id="school" name="school" placeholder="School" required>

            <button type="submit" class="add-button">Add</button>
        </form>
    </div>

    <?php include 'admin_footer.php'?>
</body>
</html>
