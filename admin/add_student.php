<?php include 'admin_header.php'?>
<?php include 'admin_sidebar.php'?>


<!DOCTYPE html>
<html>
<head>
    <title>Tutor / Tutee Application</title>
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
    <center><h1>Tutor / Tutee Application</h1></center>
    <div class="container">
    
    <form action="submit_application.php" method="post">
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
        <input type="text" id="concentration" name="concentration">
        <br><br>

        <!-- Submit Button -->
        <input type="submit" value="Add">
    </form>
    </div>

    <?php include 'admin_footer.php'?>
</body>
</html>
