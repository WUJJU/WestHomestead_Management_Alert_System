<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>

 <?php
    $pid=$_POST['pid'];//parcel id
    $p_address=$_POST['p_address'];
    $units=$_POST['units'];
    $owner_name=$_POST['owner_name'];
    $owner_address=$_POST['owner_address'];
    $city=$_POST['city'];
    $ZIP=$_POST['ZIP'];

    $cellphone=$_POST['cellphone'];
    $email=$_POST['email'];
    $cat=$_POST['cater'];
    

    //$sql0="INSERT INTO property (pid,p_address,units) VALUES ('$pid','$p_address',$units)";

 

    $sql="INSERT INTO property_owner (owner_name, owner_address,city,ZIP,cellphone,email) VALUES('{$owner_name}' ,'{$owner_address}' , '{$city}' ,
         '{$ZIP}', '{$cellphone}' ,'{$email}') ";
          
               if(mysqli_query($conn,$sql)){

    
              $last_id=mysqli_insert_id($conn);
       

    $sql0="INSERT INTO property (pid,p_address,owner_id,units,state) VALUES ('$pid','$p_address',$last_id,$units,'$cat')";

        mysqli_query($conn,$sql0);
      }else{
           	echo mysqli_error($conn);
           };
  mysqli_close($conn);
 header("location:index.php");
 ?>
     
   