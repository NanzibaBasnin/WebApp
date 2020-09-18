<?php
session_start();
$conn=mysqli_connect("localhost","root","","recylebank");

if (isset($_POST['submit']))
{
	$eid=$_POST['id'];
$points=$_POST['points'];
$query="UPDATE user SET Points=Points+'$points' where ID='$eid'";
 $res=mysqli_query($conn,$query);
 header("Location:adminhomepage.php");
}




?>



<!DOCTYPE HTML>
<html>
<head>
<title>Add Points</title>
<link rel="stylesheet" href="logincss.css"/>

</head>


<body>
<div class="navbar">
  <nav>
	<ul>

	<li><a href="home.php">Sign up</a></li>
	<li><a href="#">Contact</a></li>
	<li><a href="#">About Us</a></li>

	</ul>
	</nav>
</div>

<div class="container">

<h2>Add Points</h2>
<form action="" method="post">
<div class="input-form">
<label>Id</label>
<input type="text" name="id"/>
</div>

<div class="input-form">
<label>points</label>
<input type="text" name="points" />
</div>

<input type="submit" name="submit" value="Add" class="login">
</form>
</div>
</div>
</body>
</html>
