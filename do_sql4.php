<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>

   <?php
     $tid=$_POST['tid_ea'];
     $name_lease=$_POST['name_lease'];
     $cellphone=$_POST['cellphone'];
     $email=$_POST['email'];
     $add_mem=$_POST['add_mem'];
     $add_name=$_POST['add_name'];
     $under18=$_POST['under18'];
     $name_add=array();
     $sql="UPDATE tenant SET name_lease='{$name_lease}', cellphone='{$cellphone}', email='{$email}', addtional_member='{$add_mem}' 
         where tid='{$tid}' ";
   
         if(!mysqli_query($conn,$sql)){
          echo mysqli_error($conn);
         }else{
         
         }


     $sql2="SELECT add_name from addtional_member where tenant_id='{$tid}' ";
      $result=mysqli_query($conn,$sql2); 
      while($name=mysqli_fetch_array($result,MYSQLI_NUM)){

          array_push($name_add,$name[0]);
      }   
    echo $sql2;


 for ($i=0;$i<count($add_name);$i++){
 $sql1="UPDATE addtional_member SET add_name='{$add_name[$i]}', under_18='{$under18[$i]}' 
         where tenant_id='{$tid}' and add_name='{$name_add[$i]}' ";

          if(!mysqli_query($conn,$sql1)){
          echo mysqli_error($conn);
         }else{
          echo $sql1;
          echo "successful update2!";
         }

       }


 
         mysqli_close($conn);
         header("location:tenant.php");

    ?>
     
   