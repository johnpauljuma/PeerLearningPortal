<?php 
    session_start();

    include './includes/header.php';
    include './includes/sidebar.php';
    include './includes/footer.php';
    include './includes/configuration.php';
    
    $studentID = $_SESSION['std_id'];
    //echo "The session ID is: ".$studentID;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the user is logged in (you may have your own authentication logic)
        if(isset($studentID)) {
            // Get the submitted rating and comments
            $rating = $_POST['rating'];
            $comments = $_POST['comments'];


            // SQL query to insert the rating and comments
            $stmt = $conn->prepare('INSERT INTO ratings (Rating, Comments) VALUES (?, ?)');
            $stmt->bind_param('is', $rating, $comments);

            if ($stmt->execute()) {
                // upon successful submition of Ratings ...
                echo "<script>
                    alert('Ratings submitted successfully!')
                    window.location.href = 'rating.php';
                    </script>";
            } else {
                echo 'Error submitting rating: ' . $stmt->error;
            }

            $stmt->close();
            
        } 
        /*else {
            // User is not logged in, redirect to the login page
            header('Location: login.php');
        }*/
        $conn->close();
    }
   /*else {
        // Redirect to the rating page if accessed directly
        header('Location: rating.php');
        
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Rating Page</title>
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .rating-container {
            width: 50%;
            text-align: center;
            background-color: #fff;
            padding: 5px 20px 5px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .rating-stars {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type="checkbox"] {
            display: none;
            
        }

        label {
            font-size: 30px;
            padding: 5px;
            cursor: pointer;
        }

        label:before {
            content: '\2605'; /* Unicode character for a star */
            color: grey;
        }

        input[type="checkbox"]:checked + label:before {
            content: '\2605';
            color: blue;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin: 0;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #submit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            float: right;
            font-weight: bold;
        }

        #submit-button:hover {
            background-color: blue;
        }

    </style>
</head>
<body>
    <div class="rating-container">
        <h1>Rate Your Experience</h1>
        <p>Please rate your experience on a scale of 1 to 5:</p>
        <div class="rating-stars">
        <form action="rating.php" method="post">
            <input type="checkbox" name="rating" id="star5" value="5"><label for="star5"></label>
            <input type="checkbox" name="rating" id="star4" value="4"><label for="star4"></label>
            <input type="checkbox" name="rating" id="star3" value="3"><label for="star3"></label>
            <input type="checkbox" name="rating" id="star2" value="2"><label for="star2"></label>
            <input type="checkbox" name="rating" id="star1" value="1"><label for="star1"></label>
        </div>
        <input type="hidden" name="rating" id="rating">

        <textarea placeholder="Optional comments (max 200 characters)" name="comments"></textarea>
        <button id="submit-button">Submit</button>
        </form>
    </div>

    <script>
        // handle star rating behavior
        const stars = document.querySelectorAll('input[type="checkbox"]');
        const labels = document.querySelectorAll('label');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => { // Change 'stars' to 'star' here
                // Uncheck all stars
                stars.forEach((s, i) => {
                    s.checked = false; // Change to 'false' to uncheck all stars
                    labels[i].classList.remove('selected');
                });

                // Check stars up to the clicked one
                for (let i = 0; i <= index; i++) {
                    stars[i].checked = true; // Change to 'true' to check stars
                    labels[i].classList.add('selected');
                }

                // Set the value of the hidden input field
                document.getElementById('rating').value = index + 1;
            });
        });


    </script>
</body>
</html>
