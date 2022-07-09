<?php
$customer_name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$citizenship = $_POST['citizenship'];
$customer_city = $_POST['homeaddrs'];
$customer_street = $_POST['street'];
$branch_name = $_POST['city'];
$pin = $_POST['pin'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if($password1==$password2){
    $password =$_POST['password1'];
//Database connection
//8111 is port address of mysql
$conn = new mysqli('localhost','root','','project',8111);
if(mysqli_connect_error()){
    die("Connection Failed ");
}
else{
    $Customer_Id = rand(100,1000);
    $account_number = rand(1000,10000).$Customer_Id;
    $stmt = "INSERT into registration(`Customer_Id`,`customer_name`,`gender`,`dob`,`mobile`,`email`,`citizenship`,`customer_city`,`customer_street`,`branch_name`,`pin`,`password`)
    value('$Customer_Id','$customer_name','$gender','$dob','$mobile','$email', 
    '$citizenship', '$customer_city', '$customer_street','$branch_name','$pin','$password')";
    $conn->query($stmt);
    $conn->commit();
    echo "<h3>Registration successfull.....</h3>";
    $acc = "INSERT INTO account(`Customer_Id`,`customer_name`,`branch_name`,`account_number`) 
    value('$Customer_Id','$customer_name','$branch_name','$account_number')";
    $conn->query($acc);
    $conn->commit();
    $conn->close();
}}
else{
    die("<h2>Password doesnot match .Please check you password and resubmit !!!</h2>");
}
?> 