<?php 
ob_start();
include 'admin_header.php';
include 'admin_sidebar.php';


// // Check if the user is not logged in, redirect to the login page
//     if (!isset($_SESSION['id'])) {
//         header("Location: adminlogin.php");
//         exit;
//     }
    /*$con = mysqli_connect('localhost', 'username', 'password', 'files') or die('Unable To connect');

    // Fetch the count of registered employees
    $queryEmployees = "SELECT COUNT(*) as employeeCount FROM tblemployees";
    $resultEmployees = mysqli_query($con, $queryEmployees);
    $rowEmployees = mysqli_fetch_assoc($resultEmployees);
    $employeeCount = $rowEmployees['employeeCount'];

    // Fetch the count of listed departments
    $queryDepartments = "SELECT COUNT(*) as departmentCount FROM tbldepartments";
    $resultDepartments = mysqli_query($con, $queryDepartments);
    $rowDepartments = mysqli_fetch_assoc($resultDepartments);
    $departmentCount = $rowDepartments['departmentCount'];

    // Fetch the count of listed leave types
    $queryLeaveTypes = "SELECT COUNT(*) as leaveTypeCount FROM tblleavetype";
    $resultLeaveTypes = mysqli_query($con, $queryLeaveTypes);
    $rowLeaveTypes = mysqli_fetch_assoc($resultLeaveTypes);
    $leaveTypeCount = $rowLeaveTypes['leaveTypeCount'];

ob_end_flush();*/
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
        font-size: 1rem;
        background-color: #0539EA;
    }
    .bold{
        font-weight: bold;
    }


    .section2{
        justify-content: space-between;
        padding: 2px 10px 2px 10px;
        border-radius: 10px;
        box-shadow: 0 0 5px 0;
    }

    .h1_dashboard{
        border-bottom: 1px;
        padding: 10px;
        
    }

    table{
        background-color: white;
        padding: 20px;
        margin-bottom: 50px;
        border-radius: 10px;
        box-shadow: 0 0 5px 0;
    }

    </style>
</head>
<body>
        <section class="cards">
                <div class="card">
                    <h2>Tutees</h2>
                    <p><b><?php echo $employeeCount; ?></b></p>
                </div>
                
                <div class="card">
                    <h2>Tutors</h2>
                    <p><b><?php echo $departmentCount; ?></b></p>
                </div>
                
                <div class="card">
                    <h2>Groups</h2>
                    <p><b><?php echo $leaveTypeCount; ?></b></p>
                </div>
            </section>
        
    <section class="section2">         
    <h1 class="h1_dashboard">Pending Students</h1><br>
           
        <table border="0" cellspacing="5", cellpadding="5", width="100%">
           
            
            <tr class="bold">
                <td>#</td>
                <td>Employee Name</td>
                <td>Leave Type</td>
                <td>Posting Date</td>
                <td>Status</td>
                <td>Action</td>
                
            </tr>
            <tr>
                <td><b>1</b></td>
                <td>Name</td>
                <td>Casual Leave</td>
                <td>Date</td>
                <td>Not Approved</td>
                <td><button style="background-color:#0539EA; color: white" >View</button></td>

            </tr>
            <tr>
                <td><b>2</b></td>
                <td>Name</td>
                <td>Annual Leave</td>
                <td>Date</td>
                <td>Not Approved</td>
                <td><button style="background-color:#0539EA; color: white">View</button></td>

            </tr>
            </table>
           
        </section>
    
    <?php include 'admin_footer.php'?>
</body>
</html>