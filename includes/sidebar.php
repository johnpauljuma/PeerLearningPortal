<head>
<script src="https://kit.fontawesome.com/3dbba9b848.js" crossorigin="anonymous">
    </script>
</head>
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
            box-shadow: 5px  0 0  0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
            background-color: #555;
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
            bottom: 4%;
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
            
            padding: 0;
        }
        .sidebar_child2{
            display: inline-flex;
            margin: 0;
            font-weight: bold;
        }
    </style>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
        <div class="sidebar_container">
        <div class="sidebar_child1"><i ><img src="./images/apply_icon.png"class="icon" alt=""></i></div>
        <div class="child2"><a href="apply.php" class="sidebar-option">Apply</a></div>
        </div>
        <a href="#" class="sidebar-option">Option 2</a>
        <a href="#" class="sidebar-option">Option 3</a>
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
</body>
</html>
