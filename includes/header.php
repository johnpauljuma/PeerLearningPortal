
<head>
<style>

header {
        width: 100%;
        height: 100px;
        top: 0;
        left: 0;
        margin: 0;
        box-shadow:   0 0  0 5px;
        position: fixed;
        display: flex;
        background-color: grey;
        
        
    }
    body{
        margin-left: 13%; 
        margin-top: 120px;
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
            margin-left: 10px;
    }
    #img{
            height: 50px;
            width: 50px;
            border-radius: 50%;
    }
    p{
            margin-top: 60px;
            margin-left: -10px;
            display: flex;
            float: left;
            position: absolute;
            font-weight: bold;
    }
    .h1_header{
            display: inline-flex;
            width: 500px;
            height: 100px;
            margin: auto;
           
           
            
    }

</style>
</head>
<body >

<header>
        <div class="image"><img src="./images/profile_image.png" alt="User Profile" class="profile-pic" id="img"><p>John Doe</p></div>
           
        <div class="h1_header"><h1>Student Learning Portal</h1></div>
</header>
    
</body>
</html>