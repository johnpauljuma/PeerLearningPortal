
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
        .logout{
            margin: 0;
            display: flex;
            bottom: 4%;
            font-weight: bolder;
        }
    </style>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
        <a href="#" class="sidebar-option">Option 1</a>
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
