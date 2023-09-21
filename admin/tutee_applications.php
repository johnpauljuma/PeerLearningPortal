<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Employees</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Reset some default styles */ 
       body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
        }
        /* Main container */
        .mn-inner {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 0;          
        }
        .header{
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            padding: 2px;
            margin-top: 5px;
        }
        .page-title {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70em; 
            border-radius: 5px;
            box-shadow: 0 0 5px 0;
              
        }
        .card-content {
            padding: 20px;
            max-width: 100%;
        }
        .card-title  {
            font-size: 20px;
            margin-bottom: 10px;
            margin-top: 20px;
        }
        /* Table styles */
        #example {
            width: 100%;
            border-collapse: collapse;
            width: 42em;
            width: 65em;
            table-layout: auto;
            border-radius: 5px;
            box-shadow: 0 0 5px 0;
        }
       
        th, td {
            border: 1px ;
            padding: 8px;
            text-align: left;
            max-width: 100%;
        }
        th {
            background-color: #f2f2f2;
        }
        th.fname, td.fname {
            min-width: 400px; /* Adjust the minimum width as needed */
        }
        th.department, td.department {
            min-width: 400px; /* Adjust the minimum width as needed */
        }
        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            max-width: 100%;
            
        }
        .show-entries select {
            margin-right: 10px;
        }
        .mn-inner div.hdiv{
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .fname {
            width: fit-content;
        }
    </style>
</head>
<body>
<div class="header"><h1>Manage Employees</h1></div>
    <div class="mn-inner">
             <div class="card">  
                <div class="card-content">
                <span class="card-title">Employees Info</span>
                <div class="table-controls">
                    <div class="show-entries">
                        Show 
                        <select>
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="search-records">
                         <input type="text" placeholder="Search records">
                    </div>
                </div>
                <table id="example">
                    <thead>
                    <tr>
                            <th>Sr no </th>
                            <th>Emp Id </th>
                            <th>Full Name </th>
                            <th>Department </th>
                            <th>Status </th>
                            <th>Reg Date </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $srNo = 1;
                        while ($employee = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?php echo $srNo; ?></td>
                            <td><?php echo $employee['EmpId']; ?></td>
                            <td><?php echo $employee['FirstName'] . ' ' . $employee['LastName']; ?></td>
                            <td><?php echo $employee['Department']; ?></td>
                            <td><?php echo ($employee['Status'] == 1) ? 'ACTIVE' : 'INACTIVE'; ?></td>
                            <td><?php echo $employee['RegDate']; ?></td>
                            <td>
                                <a href="editemployee.php?empid=<?php echo $employee['id']; ?>">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="manageemployees.php?del=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?');">
                                    <i class="material-icons" title="Delete">clear</i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            $srNo++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>