<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include 'admin_header.php';
    include 'admin_sidebar.php';
    include 'configuration.php';

    // Fetch data from the tutee_applications table
    $sql = "SELECT * FROM tutor_applications";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Admin | manage courses</title>

    <script>
       
        
    </script>
    <style>
        .container {
            height: fit-content;
            width: fit-content;
            margin: auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 0 5px 0;
            border-radius: 10px;
            border-style: outset;
        }
        
        table {
            margin: auto;
            margin-top: 2em;
            padding: 10px;
            box-shadow: 0 0 3px 0;
        }

        th {
            padding: 5px;
            text-align: left;
            box-shadow: 0 0 5px 0;
        }

        td {
            border: 1px;
            margin: 5px;
            text-align: left;
            padding: 10px;
        }

        span {
            color: red;
            margin-left: 0;
            margin-right: 2em;
        }

        h3 {
            margin: 0;
            margin-top: 10px;
            margin-bottom: -10px;
        }

        .h3 {
            display: inline-flex;
            width: 50%;
            
        }
        .match{
            display: inline-flex;
            padding: 2px 10px 0 10px;
            justify-content: flex-end;
            width: 100%;
            max-width: 100%;
            float: right;
            font-weight: bold;
            margin-left: 2em;
            border-radius: 10px;
            
        }
        .match_student{
           
            padding: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px 0;
            background-color: orange;
            
        }
        .match_student:hover{
            background-color: blue;
        }

        .cover {
            display: flex;
            margin-bottom: -20px;
            margin-top: 1em;
        }


        .form_container {
            display: inline-flex;
            right: 0;
            float: right;
            justify-content: flex-end;
            width: 100%;
            padding: 0;
        }

        form {
            float: right;
            right: 0;
            height: 40px;
            display: flex;
            max-width: 300px;
            
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
            border-radius: 20px 0 0 20px;
            
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
        }

       form.example button:hover {
            background: blue;
        }

        td button{
            font-size: 16px;
            font-family: tahoma;
            border: 0;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 5px 0 0 blue;
        }

        button:hover {
            background: red;
            cursor: pointer;
        }

       form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    
        <center><h2>Tutor Applications</h2></center>
    <div class="container">
        <div class="cover">
            <div class="h3"><h3>Student Details</h3></div>
            <div class="match"><a href="#" class="match_student" onclick="matchStudents()"><h3>Match Student(s)</h3></a></div>
            <div class="form_container">
                <form class="example" action="">
                    <input type="text" placeholder="Search student..." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Year of Study</th>
                <th>Course</th>
                <th>Drop</th>
                <th id="head">Select All<input type="checkbox" name="select_all" id="select_all"></th>
            </tr>
        

            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Student_ID"] . "</td>";
                        echo "<td>" . $row["Full_Name"] . "</td>";
                        echo "<td>" . $row["Year"] . "</td>";
                        echo "<td>" . $row["Course"] . "</td>";
                        echo "<td><button onclick='drop_tutor(" . $row["Student_ID"] . ")'>Drop</button></td>";
                        echo "<td><input type='checkbox' name='select_row[]' class='row-checkbox' value='" . $row["Student_ID"] . "'></td>";
                        echo "</tr>";
                    }
                } 
                else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
        ?>
    </table>

    <script>
       if(true){
         //handling the checkboxes.
         const selectAllCheckbox = document.getElementById('select_all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const deselectAllText = 'Deselect All';

        selectAllCheckbox.addEventListener('change', () => {
            rowCheckboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });

        if (selectAllCheckbox.checked) {
                document.getElementById('head').innerHTML = deselectAllText;
            } 
            else {
                document.getElementById('head').innerHTML = 'Select All<input type="checkbox" name="select_all" id="select_all">';
            }
        });

        rowCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                let allChecked = true;
                rowCheckboxes.forEach((cb) => {
                    if (!cb.checked) {
                        allChecked = false;
                    }
                });
                if (allChecked) {
                    document.getElementById('head').innerHTML = deselectAllText;
                } else {
                    document.getElementById('head').innerHTML = 'Select All<input type="checkbox" name="select_all" id="select_all">';
                }
            });
        });

        //Event listener for the "Deselect All" text
        const deselectAllElement = document.getElementById('head');
        deselectAllElement.addEventListener('mouseover', () => {
            if (deselectAllElement.textContent === deselectAllText) {
                deselectAllElement.style.backgroundColor = 'blue';
                deselectAllElement.style.color = 'white';
                deselectAllElement.style.cursor = 'pointer';
            }
        });

        deselectAllElement.addEventListener('mouseout', () => {
            deselectAllElement.style.backgroundColor = '';
            deselectAllElement.style.color = '';
        });

        deselectAllElement.addEventListener('click', () => {
            if (deselectAllElement.textContent === deselectAllText) {
                rowCheckboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });
                selectAllCheckbox.checked = false;
                deselectAllElement.innerHTML = 'Select All<input type="checkbox" name="select_all" id="select_all">';
            }
        });

       }
       else{
            selectAllCheckbox.addEventListener('change', () => {
                rowCheckboxes.forEach((checkbox) => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
       }
        

        let isPopupVisible = false; // Track whether the popup is currently displayed

        // JavaScript function to handle match students button click
        function matchStudents() {
            if (isPopupVisible) {
                // If the popup is already visible, remove it and change the button text
                const popup = document.getElementById('matchingPopup');
                if (popup) {
                    document.body.removeChild(popup);
                }
                isPopupVisible = false;
                document.querySelector('.match_student h3').textContent = 'Match Student(s)';
            } else {
                // If the popup is not visible, create and display it
                const selectedTutorIDs = [];
                const rowCheckboxes = document.querySelectorAll('.row-checkbox:checked');

                // Collect the selected tutor IDs
                rowCheckboxes.forEach((checkbox) => {
                    selectedTutorIDs.push(checkbox.value);
                });

                if (selectedTutorIDs.length === 0) {
                    alert('Please select a tutor to match.');
                    return;
                }

                
                // Send the selected tutor IDs to the server via AJAX for matching
                // You will need to implement the server-side logic for matching here

                // For demonstration purposes, display a pop-up with matching tutees
                const matchingTutees = ['Tutee 1', 'Tutee 2', 'Tutee 3']; // Replace with actual matching results

                if (matchingTutees.length === 0) {
                    alert('No matching tutees found.');
                    return;
                }

                const tuteeList = matchingTutees.map((tutee) => `<a href="#">${tutee}</a>`).join('<br>');

                const popup = document.createElement('div');
                popup.innerHTML = `<h3>Matching Tutees:</h3>${tuteeList}`;
                popup.id = 'matchingPopup';
                popup.style.padding = '20px';
                popup.style.backgroundColor = 'blue';
                popup.style.border = '1px solid #ccc';
                popup.style.borderRadius = '10px';
                popup.style.position = 'fixed';
                popup.style.top = '50%';
                popup.style.left = '50%';
                popup.style.transform = 'translate(-50%, -50%)';
                popup.style.zIndex = '1000';

                document.body.appendChild(popup);
                isPopupVisible = true;
                document.querySelector('.match_student h3').textContent = 'Close ';
            }
        }

        $(document).ready(function() {
        // Function to handle search by ID or Name
        function search() {
            const searchText = $('#searchText').val().toLowerCase();
            const rows = $('table tbody tr');

            rows.each(function() {
                const idCell = $(this).find('td:first-child');
                const nameCell = $(this).find('td:nth-child(2)');
                const idText = idCell.text().toLowerCase();
                const nameText = nameCell.text().toLowerCase();

                if (idText.includes(searchText) || nameText.includes(searchText)) {
                    $(this).css('background-color', 'yellow'); // Highlight matching rows
                } else {
                    $(this).css('background-color', ''); // Clear highlighting
                }
            });
        }

        // Event listener for search input
        $('#searchText').on('input', search);
        });


        // JavaScript function to confirm student deletion
        function drop_tutor(Student_ID) {
            if (confirm('Are you sure you want to delete this Student?')) {
                window.location.href = 'drop_tutor.php?Student_ID=' + Student_ID;
            }
        }
    </script>
    <?php include 'admin_footer.php';

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
