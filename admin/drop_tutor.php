<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'configuration.php';

    if(isset($_GET['Student_ID'])) {
        $id = $_GET['Student_ID'];
        
        // SQL query to delete the row
        $sql = "DELETE FROM tutor_applications WHERE Student_ID = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "<script>
                    alert('Student Dropped successfully!');
                    window.location.href = 'tutor_applications.php';
                </script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } 
        else {
            echo "Error: " . $conn->error;
        }
        
        $conn->close();
    }
?>
