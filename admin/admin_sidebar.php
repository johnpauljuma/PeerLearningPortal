<!DOCTYPE html>
<html>
<head>
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
            box-shadow: 5px 0 0 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            background-color: orange;
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
            <a href="#" class="sidebar-option">Option 4</a>
            <a href="#" class="sidebar-option">Option 5</a>
            <a href="#" class="sidebar-option">Option 11</a>
            <a href="#" class="sidebar-option">Option 12</a>
            <a href="#" class="sidebar-option">Option 13</a>
            <a href="#" class="sidebar-option">Option 14</a>
            <a href="#" class="sidebar-option">Option 15</a>
        </div>

        <div class="logout"><a href="logout.php" class="sidebar-option logout-option">Logout</a></div>
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
