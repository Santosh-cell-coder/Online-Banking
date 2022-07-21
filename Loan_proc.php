<?php
session_start();
error_reporting(0);
?>
<?php
include 'header.php';
include 'customer_profile_header.php' ;
$customer_id = $_SESSION['Customer_Id'];
$branch = $_SESSION['branch_name'];
$amount = $_SESSION['amount'];
$pin1=$_POST['pin'];
$pin2=$_SESSION['pin'];
$loan_amount = $_POST['loan'];
$remark=$_POST['remark'];
include 'db_connect.php';
if($pin1!=$pin2){
    echo '<script>alert("Incorrect Pin code.!!")</script>';
}
else{
$sql="SELECT * FROM account where Customer_Id= '$customer_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$balance=$row['balance'];
if($loan_amount>1.5*$balance){
    echo '<script>alert("Loan request Rejected.!!")</script>';
            echo "<h3>Loan Request rejected !!! You can only get loan
                   amount equal or less than 150% of your current balance. </h3>";
}
else{
    if($amount!=NULL){
        echo '<script>alert("Loan request Rejected.You have previous loan to pay!!")</script>';
    }
    else{
    $loan_num=rand(10000,999999);
    $sql1="INSERT INTO pending_loan(`Customer_Id`,`branch_name`,`loan_num`,`amount`,`remark`)
                        value('$customer_id','$branch','$loan_num','$loan_amount','$remark')";
       $conn->query($sql1);
       $conn->commit();                 
    echo "<h3>Loan request is send successfully !!!</h3>";}
}
}

?>
<html>
    <style>
        h3{
            padding-top:10%;
            text-align:center;
            background-color:white;

        }
    </style>
</html>