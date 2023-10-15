<?php
    include 'configuration.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // SQL query to delete the row
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "<script>
                    alert('Course deleted successfully!');
                    window.location.href = 'manage_courses.php';
                </script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();

            // Update the IDs in the table
            $update_query = "SET @count = 0;
            UPDATE courses SET id = @count:= @count + 1;
            ALTER TABLE courses AUTO_INCREMENT = 1;";
            if ($conn->multi_query($update_query) === TRUE) {
                echo "IDs updated successfully";
            } else {
                echo "Error updating IDs: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
        
        $conn->close();
    }
?>
