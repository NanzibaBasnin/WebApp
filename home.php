<?php
$conn=mysqli_connect("localhost","root","","recylebank")
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="homecss.css"/>
</head>


<body>
	<div class="navbar">
	<nav>
	<ul>

	<li><a href="index.php">Home</a></li>
	<li><a href="#">Contact</a></li>
	<li><a href="#">About Us</a></li>
	<li><a href="login.php">login</a></li>
	</ul>
</nav>
	</div>


<div class="container">

<h2>Sign Up</h2>
<form action="" method="post">
<div class="input-form">
<input type="text" name="firstname" placeholder="Firstname" minlength="3" maxlength="20"required="required" >
</div>

<div class="input-form">
<input type="text" name="username" placeholder="username"  minlength="3" maxlength="12" required="required">
</div>
<div class="input-form">
<input type="text" name="address" placeholder="address"  required="required">
</div>

<div class="input-form">
<input type="email" name="email" placeholder="Email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required="required">

</div>


<div class="input-form">
<input type="number" name="phonenumber" placeholder="phone number"  min="3"  pattern="(^[+]{1}[8]{2}[01]{1}[0-9]{9}|^[8]{2}[01]{1}[0-9]{9}|^[01]{2}[0-9]{9})$"required="required">

</div>
<div class="input-form">
<input type="password" name="password" placeholder="password"  required="required" minlenght="8"pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." required>

</div>



<input type="submit" name="submit" value="Sign up" class="login">
</form>
</div>
</div>

<?php
if(isset($_POST['submit'])){
	$firstname=$_POST['firstname'];
	$username=$_POST['username'];
	$address=$_POST['address'];
  $email=$_POST['email'];

	$phonenumber=$_POST['phonenumber'];
	$password=$_POST['password'];
	$query=("INSERT INTO user(Name,UserName,Address,Email,PhoneNumber,Password) VALUES ('$firstname','$username','$address','$email','	$phonenumber','$password')");
	$run=mysqli_query($conn,$query);


	if($run)
	{
		echo "<script>alert('Your are now member, start recycling!!!')</script>";
	}
	else{
		echo"error:".mysqli_error($conn);
	}
}
?>
</body>
</html>
