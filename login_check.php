<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>



<?php


$uname=$_POST['username'];
$pword=$_POST['password'];



$sql="SELECT * FROM manager WHERE username='".$uname."' AND password='".$pword."' ; ";


$result=mysqli_query($conn,$sql);

$count=mysqli_fetch_array($result,MYSQL_ASSOC);

if(!$count==null){


       $_SESSION['username']=$_POST['username'];
	  $_SESSION['password']=$_POST['password'];
	  $_SESSION['privilege']=$count['privilege'];



	if($count["privilege"]==0)
	
	  {header("location:index.php");}

    else { header("location:index2.php");}
}

mysqli_close($conn);
?>