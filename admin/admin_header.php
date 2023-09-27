
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
             padding-top: 120px;  
             position: relative; 
             height: 100vh;
             margin-bottom: 2em;
             margin-left: 13%;
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
        img{
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
        .h1{
                display: inline-flex;
                width: 500px;
                height: 100px;
                margin: auto;
               
               
                
        }
        @media screen and (max-width: 768px) {
                .h1{
                        font-size: 24px;
                }
                header{
                        width: 100%;
                        height: 50px;
                }
                h1{
                        font-size: 18px;
                }
        }

</style>
<header>
        
           
        <div class="h1"><h1>Student Learning Portal</h1></div>
</header>
    
</body>
</html>