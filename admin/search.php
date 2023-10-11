<?php
include 'admin_header.php';
include 'admin_sidebar.php';

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "student";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize search query
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Construct SQL query to search for students
$sql = "SELECT * FROM tutor_applications 
        WHERE Student_ID LIKE '%$search_query%' OR Full_Name LIKE '%$search_query%'";

$result = $conn->query($sql);
?>

<!-- Display search results -->
<table>
    <tr>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Year of Study</th>
        <th>Course</th>
        <th>Drop</th>
        <th>Select All<input type="checkbox" name="select_all" id="select_all"></th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Student_ID"] . "</td>";
            echo "<td>" . $row["Full_Name"] . "</td>";
            echo "<td>" . $row["Year"] . "</td>";
            echo "<td>" . $row["Course"] . "</td>";
            echo "<td><a href='#'>Drop</a></td>";
            echo "<td><input type='checkbox' name='select_row[]' class='row-checkbox' value='" . $row["Student_ID"] . "'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No matching data available</td></tr>";
    }
    ?>
</table>

<?php
// Close the database connection
$conn->close();
include 'admin_footer.php';
?>
