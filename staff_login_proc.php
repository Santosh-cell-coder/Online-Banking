<?php
session_start();
?>
	<?php
include 'db_connect.php';
if(isset($_POST['login-btn'])){
	$staff_id=$_POST['staff_id'];
	$password=$_POST['password'];
	$sql="SELECT * FROM staff where staff_id ='$staff_id' and password='$password' ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row==NULL){
			
			echo '<script>alert("Incorrect Staff_id/Password.")</script>';
				
			
		}
        else{
            $_SESSION['staff_login'] = true;
        $_SESSION['staff_id'] = $staff_id;
		$_SESSION['staff_name'] = $row['staff_name'];
		$_SESSION['gender'] = $row['gender'];
		$_SESSION['dob'] = $row['dob'];
		$_SESSION['post'] = $row['post'];
		$_SESSION['branch_name']= $row['branch_name'];
		$_SESSION['mobile_no'] = $row['mobile_no'];
		$_SESSION['email_id']= $row['email_id'];
		$_SESSION['home_addr'] = $row['home_addr'];
		$_SESSION['password'] =$row['password'];
		date_default_timezone_set('Asia/kathmandu'); 
		$_SESSION['this_login'] = date("d/m/y h:i:s A");

		header('location:staff-profile.php');
		
		}

}

?>