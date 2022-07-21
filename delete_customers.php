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
    <title>Delete Customer</title>
    <link rel="stylesheet" type="text/css" href="css/del_customers.css">
</head>
<body>
    <div class="del_container">
        <h2 id="head_box">Delete Customer Data</h2>
        <h4 id="warning">*Warning: All data related to the respective customer will be deleted permanently.</h4>
            <form action="delete_customers_proc.php" method="post">
                <fieldset>
              <div id="first_inp"><h4>Account Number:</div></h4> <input type="number" name="account_num" required>
              <label ><input id="sec_inp" type="submit" name="butn" value="delete"></label>
            </fieldset>
            </form>
    </div>
</body>
</html>