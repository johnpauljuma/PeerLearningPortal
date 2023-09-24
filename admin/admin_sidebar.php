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
            background-color: orange;
            color: #f9f9f9;
            overflow-y: scroll;
        }

        /* Sidebar Option Styles */
        .sidebar-option {
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: block;
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
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            height: fit-content;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 10px;
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
            
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <a href="admin_index.php" class="sidebar-option">Home</a>
            <div class="dropdown" onclick="toggleDropdown(this)">
                <a href="#" class="sidebar-option">Applications &#9662;</a>
                <div class="dropdown-content">
                    <div class="a"><a href="add_student.php">Add Student</a></div>
                    <div class="a"><a href="tutee_applications.php">Tutee</a></div>
                    <div class="a"><a href="tutor_applications.php">Tutor</a></div>
                    <div class="a"><a href="matched.php">Matched students</a></div>
                    <div class="a"><a href="pending.php">Pending Students</a></div>
                </div>
            </div>

            <div class="dropdown" onclick="toggleDropdown(this)">
                <a href="#" class="sidebar-option">Courses &#9662;</a>
                <div class="dropdown-content">
                    <div class="a"><a href="add_course.php">Add Course</a></div>
                    <div class="a"><a href="manage_courses.php">Manage Courses</a></div>
                </div>
            </div>
           
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-sign-out" style="font-size:30px"></i></div>
        <div class="sidebar_child2"><a href="#" class="sidebar-option">Sign Out</a></div>
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
    </script>
</body>
</html>
