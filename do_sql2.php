<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>

 <?php

    $owner_id=$_SESSION['oid'];
    $owner_name=$_POST['owner_name'];
    $owner_address=$_POST['owner_address'];
    $city=$_POST['city'];
    $ZIP=$_POST['ZIP'];
    $cellphone=$_POST['cellphone'];
    $email=$_POST['email'];
    

    $sql="UPDATE property_owner SET owner_name='{$owner_name}', owner_address='{$owner_address}',city='{$city}',ZIP='{$ZIP
            }',cellphone='{$cellphone}',email='{$email}' where owner_id='{$owner_id}' ";

 

          echo $sql;
              if(!mysqli_query($conn,$sql)){
 
           	echo mysqli_error($conn);
}
  mysqli_close($conn);

  header("location:modify_property.php");

 ?>
     
   