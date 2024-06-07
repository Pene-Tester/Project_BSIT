<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>MALUPITON LIBRARY</title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="shortcut icon" type="x-icon" href="images/icon.png">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	               <link rel="stylesheet" href="css/header.css" type="text/css" media="all">
				   <link rel="stylesheet" href="css/footer.css" type="text/css" media="all">
				   
	               
	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>
 <header>
    <div class="content flex_space">
      <div class="logo">
	  <img src="images/logo.png">
      </div>
  </header>
  <h1></h1>
	<div class="container">
		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
				<input type="text" Name="RollNo" placeholder="Username" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Sign In">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>
		<div class="register">
			<h2>Sign Up</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="Username" required="">
				<input type="password" Name="Password" placeholder="Password" required>
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up">
			    </form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<h1></h1>
  <div class="legal">
    <p>Copyright (c) 2024 Copyright Holder All Rights Reserved.</p>
  </div>
<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];

 $sql="select * from db_library.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:admin/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$type='Admin';

	$sql="insert into db_library.user (Name,Type,RollNo,EmailId,MobNo,Password) values ('$name','$type','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>


</body>
<!-- //Body -->

</html>
