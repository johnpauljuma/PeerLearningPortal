<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            width: 12%;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 5px  0 5px  0;
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
    </style>
</head>
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
    </div>
</body>
</html>
