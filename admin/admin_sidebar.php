<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/3dbba9b848.js" crossorigin="anonymous">
    </script>

    <style>
        /* Sidebar Styles */
        .sidebar {
            height: 100%;
            margin-top: 100px;
            margin-bottom: 20px;
            width: 12%;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 5px 0 0 0 black;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            background-color: darkblue;
            color: white;
            overflow-y: scroll;
            
        }

        /* Sidebar Option Styles */
        .sidebar-option {
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: block;
            color: white;
        }

        /* Highlighted Option Style */
        .active {
            background-color: #555;
        }
        .logout-option {
            margin-top: auto;
            padding-bottom: 20px;
            display: flex;
        }

        .logout {
            margin: 0;
            display: flex;
            bottom: 4%;
            font-weight: bolder;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: flex;
            color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            color: white;
            
            height: fit-content;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 10px;
            margin-top: 3em;
            margin-left: 5px;
        }

        
        .a {
            text-decoration: none;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
        }
        .sidebar_container{
            display: flex;
            
        }
        .sidebar_scontainer{
            display: flex;
            bottom: 10px;
            position: fixed;
        }
        .sidebar_child1{
            display: inline-flex;
            margin: 0;
            margin-left: 10px;
            margin-top: 10px;
            padding: 0;
        }
        .sidebar_child2{
            display: inline-flex;
            margin: 0;
            font-weight: 100;
            margin-right: -10px;
            padding: 0;
            color: white;
            
        }

        .hamburger {
            font-size: 36px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1;
            color: white;
        }

        @media screen and (max-width: 768px) {
            body{
                height: 100vh;
                width: 100%;
                padding: 0;
                margin: auto;
            }
            .sidebar{
                /*overflow: hidden;*/
                
                position: absolute;
                height: auto;
                width: fit-content;
                margin-top: 50px;
                padding-top: 35px;
                
            }
            .sidebar_scontainer{
                position: relative;
            }

            .hamburger {
            display: block;
        }

        .arrow {
            display: none;
        }
        .hamburger {
            font-size: 36px;
            cursor: pointer;
            position: fixed;
            top: 50px;
            left: 40px;
            z-index: 1;
            color: white;
        }
        }
    </style>
</head>
<body>
<div class="hamburger" id="hamburger" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    

        <div>
        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-home" style="font-size:24px"></i></div>
        <div class="sidebar_child2"><a href="dashboard.php" class="sidebar-option">Home</a></div>
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class='fas fa-tachometer-alt' style='font-size:24px'></i></i></div>
        <div class="sidebar_child2"><a href="dashboard.php" class="sidebar-option">Dashboard</a></div>
        </div>

        <div class="sidebar_container">
                <div class="dropdown" onclick="toggleDropdown(this)">
                <div class="sidebar_child1"><i class="fa fa-address-card-o" style="font-size:24px"></i></div>
                <div class="sidebar_child2"><a href="#" class="sidebar-option">Students &#9662;</a></div>
                <div class="dropdown-content">
                    <div class="a"><a href="add_student.php">Add Student</a></div>
                    <div class="a"><a href="tutee_applications.php">Tutee</a></div>
                    <div class="a"><a href="tutor_applications.php">Tutor</a></div>
                    <div class="a"><a href="matched.php">Matched students</a></div>
                    <div class="a"><a href="pending.php">Pending Students</a></div>
                </div>
            </div>
        </div>

            <div class="dropdown" onclick="toggleDropdown(this)">
            <div class="sidebar_child1"><i class="fa fa-newspaper-o" style="font-size:24px"></i></div>
                <a href="#" class="sidebar-option">Courses &#9662;</a>
                <div class="dropdown-content">
                    <div class="a"><a href="add_course.php">Add Course</a></div>
                    <div class="a"><a href="manage_courses.php">Manage Courses</a></div>
                </div>
            </div>
           
        </div>

        <div class="sidebar_scontainer">
        <div class="sidebar_child1"><i class="fa fa-sign-out" style="font-size:30px"></i></div>
        <div class="sidebar_child2"><a href="admin_login.php" class="sidebar-option">Sign Out</a></div>
        </div>
    </div>

    <script>
        function toggleDropdown(dropdown) {
            const dropdownContent = dropdown.querySelector(".dropdown-content");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }

    // Function to toggle the sidebar
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var hamburger = document.getElementById("hamburger");

        if (sidebar.style.display === "flex") {
            sidebar.style.display = "none";
            
        } else {
            sidebar.style.display = "flex"; // Adjust this width as needed
            
        }
    }
</script>
</body>
</html>
