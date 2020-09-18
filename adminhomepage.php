
<?php
session_start();
$conn=mysqli_connect("localhost","root","","recylebank"); //please use db password if you have one
$query="select Id,userId,Username,TypeName,WeightNo,Points From order_tbl  INNER JOIN type on order_tbl.TypeId=type.TypeID INNER JOIN weight on order_tbl.WeightId=weight.WeightID where Confirm='yes'";
$result=mysqli_query($conn,$query);
//$row = mysqli_fetch_array($result);
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

if(isset($_GET['up']))//to take user ID from below
{

	$id = $_GET['up'];//id is taken to perform two actions- 1.confirm in order table is put to no 2.add points to user table
	$query1="UPDATE order_tbl SET Confirm='no' WHERE Id='$id'";
	$query2="SELECT * FROM order_tbl WHERE Id='$id'";

	$res1=mysqli_query($conn,$query1);//execute query
	$order=mysqli_query($conn,$query2);//execute query

	$userpoint = 0;
	$weightpoint = 0;
	$user_id = 0;
	$weight_id = 0;

	while($row = mysqli_fetch_assoc($order)){
		$user_id = $row["UserId"];//user id and weight id comes from order table
		$weight_id = $row["WeightId"];
	}


	$query3="SELECT Points FROM weight WHERE WeightID='$weight_id'";//selecting weigtid from order table through the row operation and points from weight table is selected
	$points=mysqli_query($conn,$query3);//execute for points

	while($row = mysqli_fetch_assoc($points)){//search points from weight table
		$weightpoint = $row["Points"];//uporer query theke ashche
	}

	$query4="SELECT Points FROM user WHERE ID='$user_id'";//fetch id from usertable
	$points=mysqli_query($conn,$query4);

	while($row = mysqli_fetch_assoc($points)){//selecting points by row operation usertable
		$userpoint = $row["Points"];
	}

	$totalpoint = $userpoint + $weightpoint;


	$query5="UPDATE user SET Points='$totalpoint' WHERE ID='$user_id'";//update to usertable
	mysqli_query($conn,$query5);

	// echo "<script>alert('Points: $point')</script>";
	// echo $totalpoint;

	//$updatedPoints=$row['Points']+;
	//$queryUpadtePoints="UPDATE user SET Points='$updatedPoints'";
	//$resultUpddateScore = ($conn, $queryUpadtePoints);

	 header("Location:adminhomepage.php");
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin page</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="adminhomecss.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />

</head>


<body>
	<div class="navbar">
	<nav>
	<ul>


	<li><a href="adminlogin.php">logout</a></li>
	</ul>
</nav>
</div>
<div class="container">
<div class="row second_row">
<div  class="col-sm-12">
<h2> Recyle Confirmed</h2>
<table class="table table-bordered">
<tr><td>UserId</td>
<td>UserName</td>
<td>Type</td>
<td>Weights</td>
<td>Points</td>
<td>Action</td>
</tr>

<?php while($row = mysqli_fetch_array($result)) { ?>
<tr ><td><?php   echo $row['userId']; ?></td>
<td><?php echo $row['Username']; ?></td>
<td><?php echo $row['TypeName']; ?></td>
<td><?php echo $row['WeightNo']; ?></td>
<td><?php echo $row['Points']; ?></td>
<td><a href="userdetails.php?id=<?php   echo $row['Id']; ?>" class="btn btn-success">User details</a>
<a href="adminhomepage.php?up=<?php   echo $row['Id']; ?>" class="btn btn-primary"> Confirm</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
  </div>

</body>
</html>
