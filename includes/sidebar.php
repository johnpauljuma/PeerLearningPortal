
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
            display: block;
            background-color: darkgray;
        }

        /* Profile Picture Styles */
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
            background-color: grey;
            padding: 5px;
        }

        /* User Name Styles */
        .user-name {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 2em;

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
        .logout{
            margin: 0;
            display: flex;
            position: fixed;
            bottom: 0;
            font-weight: bolder;
        }
    </style>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Profile Picture -->
        <img src="./images/profile_image.png" alt="User Profile" class="profile-pic">
        
        <!-- User Name -->
        <div class="user-name">
            John Doe
        </div>

        <!-- Sidebar Options -->
        <a href="#" class="sidebar-option">Option 1</a>
        <a href="#" class="sidebar-option">Option 2</a>
        <a href="#" class="sidebar-option">Option 3</a>
        <a href="#" class="sidebar-option">Option 4</a>
        <a href="#" class="sidebar-option">Option 5</a>

        <div class="logout"><a href="logout.php" class="sidebar-option logout-option">Logout</a></div>
        
    </div>
</body>
</html>
