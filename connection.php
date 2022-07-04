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

//Database connection
$conn = new mysqli('localhost','root','root','project');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(`customer_name`,`gender`,`dob,mobile`,`email`,`citizenship`,`customer_city`,`customer_street`,`branch_name`,`pin`)
    value(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssss",$customer_name, $gender, $dob, $mobile, $email, 
    $citizenship, $customer_city, $customer_street, $branch_name, $pin);
    $stmt->execute();
    echo "Registration Successful...";
    $stmt->close();
    $conn->close();
}
?> 