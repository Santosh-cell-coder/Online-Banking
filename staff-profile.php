<?php
 include 'header.php';
 include 'staff_profile_header.php';
?>
<html>
<head>
    <title>Staff Profile</title>
    <link rel="stylesheet" type="text/css" href="css/Staff_profile.css" />
</head>
<body><div class="outer">
<div class="box">
          <div class="smallb"> <a href="view_customers.php"><input type="button" name="view_customers" value="View Active Customer" id="view" > </a></div>
          <div class="smallb"> <a href="view_customers_acc.php"><input type="button" name="view_customers_acc" value="Customers Account Details" id="delete" > </a></div>
         
          <div class="smallb"><a href="delete_customers.php"><input type="button" name="delete_cust" value="Delete Customer" id="delete"></a></div>
          <div class="smallb"><a href="approve_loan.php"><input type="button" name="approve" value="Pending Loan Request" id="loan"></a></div>
          <div class="smallb"><a href="credit_customers.php"><input type="button" name="credit_cust" value="Credit Customer" id="credit"></a></div>
  </div>
          </div>

</body>
</html>