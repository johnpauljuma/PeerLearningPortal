<?php 
    include './includes/header.php';
    include './includes/sidebar.php';


    $dbHost = "localhost";
    $dbUser = "username";
    $dbPassword = "";
    $dbName = "student";

    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $user_id = intval($_SESSION['std_id']);

    $query = $connection->prepare("SELECT Student_ID, Full_Name, Email FROM tblregistration WHERE Student_ID = ?");
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $std_id = $row['Student_ID'];
        $full_name = $row['Full_Name'];
        $email = $row['Email'];
        
    } else {
        echo "Student not found.";
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $new_std_id = $_POST['std_id'];
        $new_full_name = $_POST['full_name'];
        $new_email = $_POST['email'];
        

        // Create an UPDATE query to update the employee's information
        $updateQuery = $connection->prepare("UPDATE tblregistration SET Student_ID=?, Full_Name=?, Email=? WHERE Student_ID = ?");
        $updateQuery->bind_param("sss", $new_std_id, $new_full_name, $new_email);

        if ($updateQuery->execute()) {
            echo "<script>
        alert('Student Information Updated successfully!')
        window.location.href = 'profile.php';
        </script>";
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $std_id = $row['Student_ID'];
            $full_name = $row['Full_Name'];
            $email = $row['Email'];
        }
        } else {
            // Update failed
            echo "Error updating Student information: " . $connection->error;
        }
    }


    // Close the database connection
    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | profile</title>
    

   <link rel="stylesheet"   type="text/css" href="mystyle.css">
   <script src="https://kit.fontawesome.com/3dbba9b848.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <style>
        .container {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            margin: 20px auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 ;
        }
        .parent-div {
            display: inline-block;
            margin: auto;
            font-size: 50px;
            
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .heading{
            display: inline-block;
        }

        .form_holder{
            display: inline-block;
        }

        label {
            font-weight: bold;
        }
        td{
            padding: 2px 10px 2px 10px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        #mobilenumber {
            width: 200px;
        }
        .submit{
            
            width: fit-content;
        }
        button{ 
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 5px 0;
            background-color: white;
            font-size: large;
            font-weight: bold;
        }
        button:hover {
            background-color: blue;
            cursor: pointer;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="parent-div">
            <i class="fa-solid fa-user"></i>
            <?php echo "$full_name" ?>
            <?php echo "$email" ?>
        </div>

        <div class="heading"><h2>Update Student Information</h2></div>

        <div class="form_holder">
        <form method="post" action="profile.php">
        <table border="0">
            <tr>
            <div class="input-row">
               <td>
                 <div class="input-group">
                  <label>Student ID: </label> 
                  <input type="text" id="std_id" name="std_id" value="<?php echo $std_id; ?>" placeholder="(Must be unique)">
                 </div>
               </td>
               <td>
                <div class="input-group">
                    <label>Full Name:</label> 
                    <input type="text" id="name" name="full_name" value="<?php echo $full_name; ?>" placeholder="first & last name">
                </div>
               </td>
               <td>
                <div class="input-group">
                    <label>Email:</label>
                    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                </div>
               </td>
            </div>
            </tr>

    <tr>
        <div class="input-row">
        <td>
            <div class="input-group">
                <div class="submit">
                    <button type="submit" >UPDATE</button>
                </div>
            </div>
        </td>
    </div>
    </tr>
   
    </table> 
    </form> 
    </div>
</body>
</html>
