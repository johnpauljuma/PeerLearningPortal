echo "<script>
        alert('Employee Information Updated successfully!')
        window.location.href = 'profile.php';
        </script>";

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
            box-shadow: 5px  0 0  0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
           background-color: grey;
        }


        /* Sidebar Option Styles */
        .sidebar-option {
            padding: 15px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            display: block;
        }

        /* Highlighted Option Style */
        .active {
            background-color: 0;
        }
        .logout-option {
            margin-top: auto; 
            padding-bottom: 20px;
            display: flex;
                    
            
        }
        .logout{
            margin: 0;
            display: flex;
            bottom: 0;
            font-weight: bolder;
        }
        .icon{
            height: 30px;
            width: 30px;
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
            font-weight: bold;
            margin-right: -10px;
            padding: 0;
            
        }
    </style>
</head>
<body>
   
    <div class="sidebar">

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-address-card-o" style="font-size:36px"></i></div>
        <div class="sidebar_child2"><a href="apply.php" class="sidebar-option">Profile</a></div>
        </div>
        
        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-address-card-o" style="font-size:36px"></i></div>
        <div class="sidebar_child2"><a href="apply.php" class="sidebar-option">Apply</a></div>
        </div>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-newspaper-o" style="font-size:36px"></i></div>
        <div class="sidebar_child2"><a href="courses.php" class="sidebar-option">Courses</a></div>
        </div>
        <a href="#" class="sidebar-option">Option 3</a>
        <a href="#" class="sidebar-option">Option 4</a>
        <a href="#" class="sidebar-option">Option 5</a>

        <div class="sidebar_container">
        <div class="sidebar_child1"><i class="fa fa-sign-out" style="font-size:36px"></i></div>
        <div class="sidebar_child2"><a href="logout.php" class="sidebar-option">Sign Out</a></div>
        </div>
        

        
    </div>
</body>
</html>
