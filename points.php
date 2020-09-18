<?php
session_start();
$conn=mysqli_connect("localhost","root","","recylebank");
if(isset($_POST['submit']))
{
$username=$_POST['user'];
$query="SELECT Points FROM user where UserName='$username'";
$result=mysqli_query($conn,$query);

}








?>



<!DOCTYPE HTML>
<html>
<head>
<title>Points</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="pointscss.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />



</head>
<body>
<div class="navbar">
	<nav>
	<ul>

	<li><a href="#">Contact</a></li>
	<li><a href="#">About</a></li>

	<li><a href="orderpage.php">Recycle Again</a></li>
  	<li><a href="homepage.php">logout</a></li>

	</ul>
</nav>
</div>
<div class="container">
<div class="row second_row">
<div  class="col-sm-6">
  <div class="point">
 <form action="" method="post">
<label for="exampleInputEmail1">Username</label>
<input type="text"  name="user" id = "usernameBox"><br><br>

<input type="submit" value="Show Points" name="submit" onclick="showUserPoints()" ><br><br>
</form>
</div>
</div>
</div>
</div>
<?php

	while( $row = mysqli_fetch_array($result) )
	{
	  	$points=$row['Points'];
			}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script>
	$(document).ready(function()
	{
    	$('#usernameBox').change(function()
    	{
        	alert("Your Point is: <?php //echo $points;  ?>");
    	});
	});
</script> -->

<script>
	function showUserPoints() {
    alert("Your Point is: <?php echo $points;  ?>");
}
</script>

</body>
</html>
