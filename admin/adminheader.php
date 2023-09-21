
<body>
<style>

    header {
            width: 100%;
            height: 100px;
            top: 0;
            left: 0;
            background-color: grey;
            margin: 0;
            box-shadow:   0 0  0 5px;
            position: fixed;
            display: flex;
            
            
        }
        body{
             padding-top: 100px;  
             position: relative; 
             height: 100vh;
             background-color: blue;
             margin-bottom: 2em;
        }
        .image{
                display: inline-flex;
                background-color: grey;
                border-radius: 50%;
                height: fit-content;
                width: fit-content;
                float: left;
                padding: 10px;
        }
        img{
                height: 50px;
                width: 50px;
                border-radius: 50%;
        }
        p{
                display: block;
                position: relative;
        }
        .h1{
                display: inline-flex;
                width: 500px;
                height: 100px;
                margin: auto;
               
               
                
        }

</style>
<header>
        <div class="image"><img src="../images/profile_image.png" alt="User Profile" class="profile-pic"></div>
        
      <div>John Doe</div>
           
        <div class="h1"><h1>Student Learning Portal</h1></div>
</header>
    
</body>
</html>