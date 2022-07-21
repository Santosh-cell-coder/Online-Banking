<?php
session_start();
include 'db_connect.php';
?>
<?php
if(isset($_POST['butn'])){
    $account_no=$_POST['account_num'];
    $sql="SELECT * FROM account WHERE account_number='$account_no' ";
    $result = $conn->query($sql);
		$row = $result->fetch_assoc();
        if($row==NULL){
			
			echo '<script>alert("Incorrect Account number")</script>';
				
			
		}
        else{
            $cus_id=$row['Customer_Id'];
            $sql2="DELETE FROM registration WHERE Customer_Id='$cus_id' ";
            $conn->query($sql2);
            $conn->commit();

            $sql3="drop table recordbook_$cus_id";
            $conn->query($sql3);
            $conn->commit();
            echo '<script>alert("Account has been deleted successfully!!")</script>';
        }
}
?>