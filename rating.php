<?php 
include './includes/header.php';
include './includes/sidebar.php';
include './includes/footer.php';
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

        input[type="radio"] {
            display: none;
        }

        label {
            font-size: 30px;
            padding: 5px;
            cursor: pointer;
        }

        label:before {
            content: '\2605'; /* Unicode character for a star */
            color: #ddd;
        }

        input[type="radio"]:checked + label:before {
            content: '\2605';
            color: #FFD700; /* Change the star color for selected radio buttons */
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
            <input type="radio" name="rating" id="star5" value="5"><label for="star5"></label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4"></label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
            <input type="radio" name="rating" id="star2" value="2"><label for="star2"></label>
            <input type="radio" name="rating" id="star1" value="1"><label for="star1"></label>
        </div>
        <textarea placeholder="Optional comments (max 200 characters)"></textarea>
        <button id="submit-button">Submit</button>
    </div>

    <script>
        // JavaScript to handle star rating behavior
        const stars = document.querySelectorAll('input[type="radio"]');
        const labels = document.querySelectorAll('label');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Uncheck all stars
                stars.forEach((s, i) => {
                    s.checked = false;
                    labels[i].classList.remove('selected');
                });

                // Check stars up to the clicked one
                for (let i = 0; i <= index; i++) {
                    stars[i].checked = true;
                    labels[i].classList.add('selected');
                }
            });
        });
    </script>
</body>
</html>
