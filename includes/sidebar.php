<head>
<script src="https://kit.fontawesome.com/3dbba9b848.js" crossorigin="anonymous">
    </script>

    <style>
        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            margin-top: 100px;
            width: 12%;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 5px  0 0  0 black;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
           background-color: blue;
           color: white;
        }


        /* Sidebar Option Styles */
        .sidebar-option {
            padding: 15px;
            text-align: center;
            font-weight: 1000;
            text-decoration: none;
            display: block;
            color: white;
        }
        .sidebar-option:hover{
            background-color: white;
            color: blue;
            border-radius: 5px;
            margin-left: 5px;
            padding: 15px 5px 15px 5px;
        }

        /* Highlighted Option Style */
        .active {
            background-color: 0;
        }
        
        .icon{
            height: 30px;
            width: 30px;
        }
        .sidebar_container{
            display: flex;
            
        }
        .sidebar_scontainer{
            display: flex;
            margin-top: 3em;
            bottom: 10px;
            position: relative;
            cursor: pointer;
            
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
            font-weight: 1000;
            margin-right: -10px;
            padding: 0;
            
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            color: blue;
            background-color: white;
            height: fit-content;
            border-radius: 5px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
            z-index: 2;
            padding: 5px;
        }
        .a {
            text-decoration: none;
            margin-bottom: 20px;
        }
        a{
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
   
    <div class="sidebar">

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-home" style="font-size:24px"></i></div>
        <div class="sidebar_child2"><a href="index.php" class="sidebar-option">Home</a></div>
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-address-card-o" style="font-size:24px"></i></div>
        <div class="sidebar_child2"><a href="profile.php" class="sidebar-option">My Profile</a></div>
        </div>
        
        <div class="sidebar_container">
        <div class="sidebar_child1"><i class='fas fa-clipboard' style='font-size:24px'></i></div>
        <div class="sidebar_child2 dropdown" onclick="toggleDropdown(this)"><a href="#" class="sidebar-option">Program &#9662;</a>
            <div class="dropdown-content">
                <div class="a"><a href="apply.php">Apply</a></div>
                <div class="a"><a href="application_history.php">My Applications</a></div>
            </div>
        </div>
        </div>

        
        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-newspaper-o" style="font-size:24px"></i></div>
        <div class="sidebar_child2"><a href="courses.php" class="sidebar-option">Courses</a></div>
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-star-o" style="font-size:24px"></i></i></div>
        <div class="sidebar_child2"><a href="rating.php" class="sidebar-option">Ratings</a></div>
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-group" style="font-size:24px"></i></i></div>
        <div class="sidebar_child2"><a href="groups.php" class="sidebar-option">Groups</a></div>
        </div>
       
        <div class="sidebar_scontainer">
        <div class="sidebar_child1"><i class="fa fa-sign-out" style="font-size:24px"></i></div>
        <div class="sidebar_child2"><a href="logout.php" class="sidebar-option">Sign Out</a></div>
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
