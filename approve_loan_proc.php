<?php
include 'db_connect.php';
$loan_num = $_POST['loan_num'];
$sql="SELECT * FROM pending_loan NATURAL JOIN account where loan_num='$loan_num' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row==NULL){
    echo '<script>alert("Loan Number donot match.Please enter correct loan number!!")</script>';
}
else{
    $cus_id = $row['Customer_Id'];
    $cus_name = $row['customer_name'];
    $branch = $row['branch_name'];
    $cus_balance = $row['balance'];
    $loan_amt = $row['amount'];
    $remark = $row['remark'];

    $sql2="SELECT * FROM branch WHERE branch_name ='$branch' ";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $assets = $row2['assets'];

    $newbalance = $cus_balance + $loan_amt;
    $newassets = $assets - $loan_amt;

    $bur="INSERT INTO borrower(`Customer_Id`,`loan_number`)
                      value('$cus_id','$loan_num') ";
    $conn->query($bur);
    $conn->commit();

    $lon="INSERT INTO loan(`loan_number`,`branch_name`,`amount`) 
                     value('$loan_num','$branch','$loan_amt')";
    $conn->query($lon);
    $conn->commit();

    $acct= "UPDATE account SET balance='$newbalance' where Customer_Id='$cus_id'";
    $conn->query($acct);
    $conn->commit();

    $brch= "UPDATE branch SET assets='$newassets' where branch_name='$branch'";
    $conn->query($brch);
    $conn->commit();

    $transac=rand(100000,999999);
    $sql="INSERT INTO recordbook_$cus_id(`Customer_Id`,`transaction_id`,
    `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
    value('$cus_id','$transac','$loan_amt',0,'$newbalance','$remark')";
    $conn->query($sql);
    $conn->commit();

    $del = "DELETE FROM pending_loan WHERE loan_num='$loan_num' ";
    $conn->query($del);
    $conn->commit();

    echo '<script>alert("Loan Approved Successfully !!")</script>';
}
?>