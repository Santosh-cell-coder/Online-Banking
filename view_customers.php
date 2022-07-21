<?php
include 'header.php';
include 'staff_profile_header.php';
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Active Customers</title>
    <link rel="stylesheet" type="text/css" href="css/view_customers.css"/>
</head>
<body>
    <div id="account">
    <span><h3>All Active Customers</h3></span>
    <div class="data">
                <table>
                <th>#</th>
                <th>Customer ID</th>
                <th width="100%">Customer Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Citizenship Number</th>
                <th>Customer City</th>
                <th>Customer Street</th>
                <th>Branch Name</th>
                <th>Account Open In</th>
        <?php 
            $sql="SELECT * FROM registration ORDER BY customer_name ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {	   
                $Sl_no = 1;
                while($row = $result->fetch_assoc()) {
              
                    echo '
                        <tr>
                        <td>'.$Sl_no++.'</td>
                        <td>'.$row['Customer_Id'].'</td>
                        <td>'.$row['customer_name'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['dob'].'</td>
                        <td>'.$row['mobile'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['citizenship'].'</td>
                        <td>'.$row['customer_city'].'</td>
                        <td>'.$row['customer_street'].'</td>
                        <td>'.$row['branch_name'].'</td>
                        <td>'.$row['InDtTm'].'</td>
                        </tr>';
                }
            }
        ?>
        </table>
    </div>
</body>
</html>