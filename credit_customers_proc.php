<html>
<?php
session_start();
error_reporting(0);
include 'header.php';
include 'staff_profile_header.php';
include 'db_connect.php';
?><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$branch_name=$_SESSION['branch_name'];
$account_no=$_POST['account_number'];
$deposite=$_POST['deposite_amount'];
$remark=$_POST['remark'];
$sql="SELECT *FROM account WHERE account_number='$account_no' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row==null){
    echo '<script>alert("Account Number donot match.Please enter correct account number!!")</script>';
}
else{
    $balance=$row['balance'];
    $cus_id=$row['Customer_Id'];
    $sql1="SELECT * FROM branch WHERE branch_name='$branch_name' ";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $assets=$row1['assets'];

    $newassets=$assets-$deposite;
    $newbalance=$balance+$deposite;

    $sql2="UPDATE branch SET assets='$newassets' where branch_name='$branch_name' ";
    $conn->query($sql2);
     $conn->commit();

     $sql3="UPDATE account SET balance='$newbalance' where account_number='$account_no' ";
     $conn->query($sql3);
      $conn->commit();

      $transac=rand(10000,999999); 
      $sql4="INSERT INTO recordbook_$cus_id(`Customer_Id`,`transaction_id`,
                          `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
              value('$cus_id','$transac','$deposite',0,'$newbalance','$remark')";
      $conn->query($sql4);
      $conn->commit();
      echo '<h3>Transaction Successful...</h3>';
 
}
?> 
</body><style> body{
        background-color:white;
    }

        h3{
            text-align:center;
            background-color:white;
        }
    </style>
</html>


<html><body>

    </body>
</html>