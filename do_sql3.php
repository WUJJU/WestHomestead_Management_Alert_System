<?php include("./includes/mysql_connect.php"); ?>
<?php  require_once("./includes/session.php");?>




        

        




 <?php
    $t_address=$_POST['t_address'];
    $unit=$_POST['unit'];
    $name_onlease=$_POST['name_onlease'];
    $cellphone=$_POST['cellphone'];
    $email=$_POST['email'];
    $addtional_member=$_POST['add_member'];
    $last_id=null;



          $sql2="SELECT pid from property where p_address='{$t_address}'";
          $result2=mysqli_query($conn,$sql2);
          $pid=mysqli_fetch_array($result2,MYSQLI_NUM)[0];

          $sql3="SELECT * from live where parcel_id='{$pid}' and unit={$unit} ";
  
          $result3=mysqli_query($conn,$sql3);

          if(!mysqli_fetch_array($result3,MYSQLI_NUM)){
      //insert directly

                  $sql="INSERT INTO tenant (name_lease,cellphone,email,addtional_member) values('{$name_onlease}',
      '{$cellphone}','{$email}','{$addtional_member}')";

 

               echo $sql;
              if(!mysqli_query($conn,$sql)){
              
            echo mysqli_error($conn);
               }else{
                $last_id=mysqli_insert_id($conn);
               }


    if($addtional_member=="Y"){
         $add_name=$_POST['add_name'];
         $under_18=$_POST['adult']; 
         echo $under_18;
          for($i=0;$i<count($add_name);$i++){
         $sql1="INSERT INTO addtional_member (tenant_id,add_name,under_18) values('{$last_id}',
      '{$add_name[$i]}','{$under_18[$i]}')";
     if(!mysqli_query($conn,$sql1)){
              
            echo mysqli_error($conn);
               }
           }
    }

            $sql4="INSERT INTO live (parcel_id, unit, tenant_id) values('{$pid}',{$unit},{$last_id})";
                 if(!mysqli_query($conn,$sql4)){
              
            echo mysqli_error($conn);
               }

          }else{
     // delete previous records then insert
            $sql7="SELECT tenant_id from live where parcel_id='{$pid}' and unit={$unit} ";
            $result7=mysqli_query($conn,$sql7);
            $tid=mysqli_fetch_array($result7,MYSQLI_NUM)[0];
             
             $sql8="DELETE FROM tenant where tid='{$tid}' ";
             $sql9="DELETE FROM addtional_member where tenant_id='{$tid}'";
             $sql5="DELETE FROM live where parcel_id='{$pid}' and unit={$unit} ";
            if(!mysqli_query($conn,$sql5)){echo mysqli_error($conn);}
        if(!mysqli_query($conn,$sql9)){echo mysqli_error($conn);}
               if(!mysqli_query($conn,$sql8)){echo mysqli_error($conn);}

//THEN insert
                  $sql="INSERT INTO tenant (name_lease,cellphone,email,addtional_member) values('{$name_onlease}',
      '{$cellphone}','{$email}','{$addtional_member}')";

 

               echo $sql;
              if(!mysqli_query($conn,$sql)){
              
            echo mysqli_error($conn);
               }else{
                $last_id=mysqli_insert_id($conn);
               }


    if($addtional_member=="Y"){
         $add_name=$_POST['add_name'];
         $under_18=$_POST['adult']; 
         echo $under_18;
          for($i=0;$i<count($add_name);$i++){
         $sql1="INSERT INTO addtional_member (tenant_id,add_name,under_18) values('{$last_id}',
      '{$add_name[$i]}','{$under_18[$i]}')";
     if(!mysqli_query($conn,$sql1)){
              
            echo mysqli_error($conn);
               }
           }
    }


               $sql6="INSERT INTO live (parcel_id, unit, tenant_id) values('{$pid}',{$unit},{$last_id})";
                 if(!mysqli_query($conn,$sql6)){
              
            echo mysqli_error($conn);
               }

          }


    




        

  

       
  mysqli_close($conn);

header("location:tenant.php");

 ?>
     
   