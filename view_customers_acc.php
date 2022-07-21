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
    <title>All Customer's Account Details</title>
    <link rel="stylesheet" type="text/css" href="css/view_customers_acc.css"/>
</head>
<body>
<body>
    <div id="account">
    <span><h3>Customer's &nbsp;Account &nbsp; Details</h3></span>
    <div class="data">
        <form action="view_customers_acc.php" method="post">
        <input type="submit" name="view_loan" value="View Customer's loan" id="view_loan">
        <input type="submit" name="view_customer" value="View Customers Account" id="view_customer"></form>
        <?php if(isset($_POST["view_loan"])){
            ?>
            <style>
                #view_loan{
                    background-color:#042d3b;
                }
            </style>
                <table>
                <th>#</th>
                <th>Customer ID</th>
                <th width="100%">Customer Name</th>
                <th>Branch Name</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Loan Number</th>
                <th>Loan Amount</th>
        <?php 
            $sql="SELECT *
            FROM account
            NATURAL JOIN loan ORDER BY customer_name ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {	   
                $Sl_no = 1;
                while($row = $result->fetch_assoc()) {
              
                    echo '
                        <tr>
                        <td>'.$Sl_no++.'</td>
                        <td>'.$row['Customer_Id'].'</td>
                        <td>'.$row['customer_name'].'</td>
                        <td>'.$row['branch_name'].'</td>
                        <td>'.$row['account_number'].'</td>
                        <td>'.$row['balance'].'</td>
                        <td>'.$row['loan_number'].'</td>
                        <td>'.$row['amount'].'</td>
                        </tr>';
                }
            }}
        ?></div>
        </table>
        <div class="data1">
        <?php if(isset($_POST["view_customer"])){
            ?>
            <style>
                #view_customer{
                    background-color:#042d3b;
                }
            </style>
                <table>
                <th>#</th>
                <th >Customer ID</th>
                <th width="100%">Customer Name</th>
                <th width="100%">Branch Name</th>
                <th width="100%">Account Number</th>
                <th width="100%">Balance</th>
        <?php 
            $sql1="SELECT *
            FROM account ORDER BY customer_name ";
            $result1= $conn->query($sql1);
            if ($result1->num_rows > 0) {	   
                $Sl_no1 = 1;
                while($row1 = $result1->fetch_assoc()) {
              
                    echo '
                        <tr>
                        <td>'.$Sl_no1++.'</td>
                        <td>'.$row1['Customer_Id'].'</td>
                        <td>'.$row1['customer_name'].'</td>
                        <td>'.$row1['branch_name'].'</td>
                        <td>'.$row1['account_number'].'</td>
                        <td>'.$row1['balance'].'</td>
                        </tr>';
                }
            }}
        ?></div>
        </table>
    </div>
</body>
</html>
