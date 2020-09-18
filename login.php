
<?php
$conn=mysqli_connect("localhost","root","","recylebank")
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Log in</title>
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

<h2>Log in</h2>
<form action="" method="post">
<div class="input-form">
<input type="text" name="username" placeholder="username" required="" />
</div>

<div class="input-form">
<input type="password" name="password" placeholder="password" required="" />
</div>

<input type="submit" name="submit" value="Login" class="login">
</form>
</div>
</div>
<?php
if(isset($_POST['username']))
{
  $username=$_POST['username'];
  $password=$_POST["password"];
  $query=("select * from user where Username='$username' and password='$password' ");
	$result=mysqli_query($conn,$query);
  $found=$result->num_rows;
  if($found>0)
  {
    session_start();
    $_SESSION['username']=1;
    header("Location:orderpage.php");

  }
  else {
    die("Sorry!invalid uaser name abnd password");
  }

}

?>
</body>
</html>
