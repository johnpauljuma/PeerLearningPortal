<?php 
ob_start();
include 'admin_header.php';
include 'admin_sidebar.php';
include 'configuration.php';
    

   /* // Fetch data from the tutee_applications table
    $sql = "SELECT * FROM tutor_applications";
    $result = $conn->query($sql);*/


    // Count the number of tutees from tutee_applications table
    $sqlTutees = "SELECT COUNT(*) AS tutee_count FROM tutee_applications";
    $resultTutees = $conn->query($sqlTutees);

    if ($resultTutees) {
        $tuteeData = $resultTutees->fetch_assoc();
        $tuteeCount = $tuteeData['tutee_count'];
    } else {
        $tuteeCount = 0; // Set to 0 if there's an error or no tutees
    }

    // Count the number of tutors from tutor_applications table
    $sqlTutors = "SELECT COUNT(*) AS tutor_count FROM tutor_applications";
    $resultTutors = $conn->query($sqlTutors);

    if ($resultTutors) {
        $tutorData = $resultTutors->fetch_assoc();
        $tutorCount = $tutorData['tutor_count'];
    } else {
        $tutorCount = 0; // Set to 0 if there's an error or no tutors
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
    .cards {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        background-color: grey;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 5 0;
    }

    .card {
        flex: 1;
        max-width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 0 10px;
        
    }


    .card h2 {
        margin-top: 10px;
        font-size: 1.5rem;
        
    }

    .card p {
        margin-top: 10px;
        font-size: 1.5rem;
        
    }
    .bold{
        font-weight: bold;
    }


    .section2{
        justify-content: center;
        padding: 0;
        padding-bottom: 1em;
        border-radius: 10px;
        box-shadow: 0 0 5px 0;
        
    }

    .h1_dashboard{
        border-bottom: 1px;
        padding: 10px;
        
    }

    table{
        border-radius: 10px;
        box-shadow: 0 0 5px 0;
        margin: auto;
        padding: 10px;
    }

    th {
        padding: 5px;
        text-align: left;
        box-shadow: 0 0 5px 0;
    }

    td {
        border: 1px;
        margin: 5px;
        text-align: left;
        padding: 10px;
    }

    span {
        color: red;
        margin-left: 0;
        margin-right: 2em;
    }

    h3 {
        margin: 0;
        margin-top: 10px;
        margin-bottom: -10px;
    }

    .h3 {
        display: inline-flex;
        width: 50%;
        
    }
    .match{
        display: flex;
        padding: 2px 10px 0 10px;
        justify-content: flex-end;
        float: right;
        border-radius: 10px;
        
    }
    .match_student{
        padding: 0 5px 2px 5px;
        border-radius: 10px;
        height: 40px;
        box-shadow: 0 0 5px 0;
       
    }

    </style>
</head>
<body>
        <section class="cards">
                <div class="card">
                    <h2>Tutees</h2>
                    <p><b><?php echo $tuteeCount; ?></b></p>
                </div>
                
                <div class="card">
                    <h2>Tutors</h2>
                    <p><b><?php echo $tutorCount; ?></b></p>
                </div>
                
                <div class="card">
                    <h2>Groups</h2>
                    <p><b><?php echo $groupCount; ?></b></p>
                </div>
            </section>
        
    <section class="section2">         
    <h1 class="h1_dashboard">Pending Students (Tutors)</h1><br>
    <div class="match"><a href="#" class="match_student"><h3>Match Student(s)</h3></a></div>
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
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
    </table>
           
</section>
    
    <!-- JavaScript to handle select all checkbox -->
    <script>
    const selectAllCheckbox = document.getElementById('select_all');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    selectAllCheckbox.addEventListener('change', () => {
        rowCheckboxes.forEach((checkbox) => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
</script>
<?php
// Close the database connection
$conn->close();
?>
<?php include 'admin_footer.php'?>
</body>
</html>
