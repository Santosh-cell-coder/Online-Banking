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
    <title>Pending loan request</title>
    <link rel="stylesheet" type="text/css" href="css/view_customers.css"/>
</head>
<body>
    <div id="account">
       <span><h3>All Pending loan request</h3></span>
        <div class="data">
            <table>
                <th>#</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Account Number</th>
                <th>Branch Name</th>
                <th>Loan Number</th>
                <th>Customer Balance</th>
                <th>Loan Amount</th>
                <th>Remarks</th>
                <th>InDtTm</th>
            <?php
                 $sql="SELECT * FROM pending_loan NATURAL JOIN account ORDER BY InDtTm DESC ";
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) {	   
                    $Sl_no = 1;
                    while($row = $result->fetch_assoc()) {
                  
                        echo '
                            <tr>
                            <td>'.$Sl_no++.'</td>
                            <td>'.$row['Customer_Id'].'</td>
                            <td>'.$row['customer_name'].'</td>
                            <td>'.$row['account_number'].'</td>
                            <td>'.$row['branch_name'].'</td>
                            <td>'.$row['loan_num'].'</td>
                            <td>'.$row['balance'].'</td>
                            <td>'.$row['amount'].'</td>
                            <td>'.$row['remark'].'</td>
                            <td>'.$row['InDtTm'].'</td>
                            </tr>';
                    }
                }

            ?>
            
            </table>
        </div>
    </div>
        <div id="inp_box">
        <form action="approve_loan_proc.php" method="post">
            <fieldset>
            <div id="first_inp"><h4>Loan Number:</div></h4> <input type="number" name="loan_num" required>
              <label ><input id="sec_inp" type="submit" name="butn" value="Approve"></label>
            </fieldset>
        </form>
        </div>
        <style>
            #first_inp{
                display: inline-block;
            }
            #inp_box{
                background-color: rgb(158, 199, 250);
                margin-top:-2%;
                width: 90%;
                text-align: center;
                margin-left: 5%;
            }
            #sec_inp{
                cursor: pointer;
                position: relative;
                padding: 0.5%;
                font-size:120%;
                width: 15%;
                border: 1px solid #426bd7;
                background-color: #335bc1;
                border-radius: 5%;
                color: white;
            }
            fieldset input[type="number"]{
    border-radius: 2%;
        font-size: 125%;
        border: 1px solid rgb(40, 37, 37);
        margin-top: 10px;
      
}
#sec_inp:hover{
    background-color: #22408c;
    transition: 0.5s;
    padding: 0.6%;
}
        </style>
</body>
</html>