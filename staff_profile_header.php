<?php 
session_start();
if($_SESSION['staff_login'] != true)
{
	
	 header('location:staff_login.php');

}	

?>
<html>
    <head>

    <link rel="stylesheet" type="text/css" href="css/customer_profile_header.css" />
    <style>
    #home, #logout{

        background-color:rgba(5, 21, 71,0.9);
        border:none;
        padding:5px;
        width:70px;
        color:white;
        cursor:pointer;
        box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
        transition-duration: 0.6s;
    }

    #home:hover, #logout:hover{

        padding:10px;
        

    }
	</style>
	</head>
    
<body id="customer_profile">
    		
			
	<?php	
		include 'db_connect.php';
		$staff_id = $_SESSION['staff_id'];
		$sql="SELECT * FROM staff WHERE staff_id='$staff_id'";
		$result=$conn->query($sql);
		if($result->num_rows > 0)
		$row = $result->fetch_assoc();
        ?>
       <div class="head">
            
             <div class="welcome">
  
             <label>Welcome <?php echo $_SESSION['staff_name']; ?></label>
                <h2><?php echo $_SESSION['post']; ?><h2>
             </label><h6 class="lstlogin">Last login : <?php echo $_SESSION['this_login'] ?> </h6>
                  </div>
            <a class="cust_home" href="staff-profile.php">
                <input type="button" name="home" value="Home" id="home"></a>
            <a class="cust_logout" href="staff_logout.php"><input type="button" name="logout_btn" value="Logout" id="logout"></a>
            
        </div>
        <style>
            h2{
                font-family: "Lucida Console", "Courier New", monospace;
                text-align:center;
            }
        </style>

    </body>
</html>