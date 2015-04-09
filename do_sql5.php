<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>
  <?php
  $newcontent=$_POST['e_content'];

$sql1="UPDATE email SET content='{$newcontent}' where id=1";
echo $sql1;
if(mysqli_query($conn,$sql1)){
echo "Record updated successfully";
};
mysqli_close($conn);


header("location:fee.php");
  ?>
