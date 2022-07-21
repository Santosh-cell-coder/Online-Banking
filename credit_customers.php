<?php
include 'header.php';
include 'staff_profile_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit</title>
    <link rel="stylesheet" type="text/css" href="css/Deposite.css"/>
</head>
<body>
<div class="cust_profile_container">
        
            <div class="acc_details">
                <h2 id="heading">Transfer money</h2>
    <form action="credit_customers_proc.php" method="post">
    <input type="number" name="account_number" placeholder="Account Number" class="acc_details" required />
        <input type="number" name="deposite_amount" placeholder="Amount: Rs" class="acc_details" required /><br>
        <input type="text" name="remark" placeholder="Remarks" class="acc_details" required /><br>
        <div id="btn"> <input type="submit" name="submit" value="Submit"></div>
    </form>
    </div>
     </div>
     <style>
        #btn{
            margin-top:30%;
            margin-right:2%;
        }
        body{
            background-color:#042d3b;
        }
        #heading{
            border:1px #004156 solid;
            padding:3%;
        }
     </style>
</body>
</html>