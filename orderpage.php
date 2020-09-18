<?php

$conn=mysqli_connect("localhost","root","","recylebank");
$query="select * from type";
$result=mysqli_query($conn,$query);
$query1="select * from weight";
$result1=mysqli_query($conn,$query1);
if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$type=$_POST['type'];
  $weight=$_POST['weight'];
	$query3=("INSERT INTO order_tbl (UserId,Username,TypeId,WeightId,Confirm) VALUES ((select ID from user where UserName ='$user'),'$user',(select TypeID from type where TypeName='$type'),(select WeightID from weight where WeightNo='$weight'),'yes')");
	$run=mysqli_query($conn,$query3);


	if($run)
	{
		echo "<script>alert('Ready for Recyle')</script>";
	}
	else{
		echo"error:".mysqli_error($conn);
	}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Order page</title>
<link rel="stylesheet" href="logincss.css"/>
</head>


<body>
<div class="navbar">
  <nav>
	<ul>
	<li><a href="index.php">Home</a></li>
		<li><a href="points.php">Check points</a></li>
			<li><a href="shoppinglist.php">Shopping List</a></li>
			<li><a href="shop.php">Buy</a></li>

	<li><a href="#">Contact</a></li>
	<li><a href="#">About Us</a></li>

			<li><a href="login.php">Logout</a></li>

	</ul>
	</nav>
</div>

<div class="container">

<h2>Order</h2>
<form action="" method="post">
<div class="input-form">
<label>Username</label>
<input type="text" name="user" required="" />
</div>

<div class="input-form">
<label>Type</label>
<select name="type">
  <option><strong>---select----</strong></option>
<?php while ($row=mysqli_fetch_array($result))
{
  echo '<option>';
  echo $row[1].'<br>';
  echo '</option>';
}

?>
</select>
</div>



<div class="input-form">
<label>Weight</label>
<select name="weight">
  <option><strong>---select----</strong></option>
<?php while ($row1=mysqli_fetch_array($result1))
{
  echo '<option>';
  echo $row1[1].'<br>';
  echo '</option>';
}

?>
</select>
</div>

<input type="submit" name="submit" value="Confirm" class="login">
</form>
</div>
</div>
</body>
</html>
