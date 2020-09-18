<?php
session_start();

$conn=mysqli_connect("localhost","root","","recylebank");
$id=$_GET['ID'];
$query="select user.ID,order_tbl.Id,type.TypeName,weight.WeightNo,weight.Points from order_tbl join user on order_tbl.UserId=user.ID join type on order_tbl.TypeId=type.TypeID join  weight on order_tbl.WeightId=weight.WeightID where order_tbl.Id='$id'";
$result=mysqli_query($conn,$query);

if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
if (isset($_GET['ID']))
{
	   $id=$_GET['ID'];
if (isset($_POST['submit']))
{
   // Taking Data From For
	   $eid=$_POST['eid'];
	  $points=$_POST['points'];
	  $sql=" UPDATE user
   SET Points=Points+'$points'
 WHERE ID IN (SELECT *
                    FROM order_tbl t
                    WHERE t.Id = '$id')";
	 $res=mysqli_query($conn,sql)or die("Could not update".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=adminhomepage.php'>";
	  echo "<script>alert('Successfully updated')</script>";


}
}





?>

   <!DOCTYPE HTML>
   <html>
   <head>
   <title>Sign Up</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <link rel="stylesheet" href="adminhomecss.css"/>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
       <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />

   </head>
   <body>
   	<div class="navbar">
   	<nav>
   	<ul>

   	<li><a href="#">Home</a></li>
   	<li><a href="#">Contact</a></li>
   	<li><a href="Add.php">Add Points</a></li>
   	<li><a href="login.php">logout</a></li>
   	</ul>
   </nav>
   </div>
   <div class="container">
   <div class="row second_row">
   <div  clas="col-sm-6">

   <?php while($row = mysqli_fetch_array($result)) { ?>
       <form action="" method="post">
      <div class="form-group">

        <input type="hidden" value="<?php echo $row['ID']; ?>" name="eid" ><br><br>
        <label for="exampleInputEmail1">Type</label>
        <input type="text" value="<?php echo $row['TypeName']; ?>" ><br><br>
        <label for="exampleInputEmail1">Weight No</label>
        <input type="text" value="<?php echo $row['WeightNo']; ?>"  ><br><br>
        <label for="exampleInputEmail1">Points</label>
        <input type="text" value="<?php echo $row['Points']; ?>" name="points"><br><br>
         <button type="submit" class="btn btn-success">Update</button>
         </div>

    </form>
 <?php }?>
    </div>
    </div>
    </div>
    </body>
    </html>
