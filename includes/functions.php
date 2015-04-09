<?php include("mysql_connect.php");?>
    <?php require_once("./includes/session.php"); ?>

<?php



function confirm_logged_in(){
global $conn;
  $username=null;
  $pass=null;
  $privilege=null;

  if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
        $username=$_SESSION['username'];
        $pass=$_SESSION['password'];
        
  }else{
        $_SESSION['username']=null;
        $_SESSION['password']=null;
}

    if($_SESSION['privilege']==0){
    	$query="select * from manager where ";
    	$query .="username='{$username}' and password={$pass}";
    	$result=mysqli_query($conn,$query);

    	 echo $query;
    	 $rowcount=mysqli_num_rows($result);
    	 if($rowcount==0)
    	 	return -1;
    	 else return 0;
    }else if($_SESSION['privilege']==1){
    	$query="select * from manager where ";
    	$query .="username='{$username}' and password='{$pass}'";
    	$result=mysqli_query($conn,$query);

    	 echo $query;
    	 $rowcount=mysqli_num_rows($result);
    	 if($rowcount==0)
    	 	return -1;
    	 else return 1;
    }
}

 // sql  of tenant.php
   function dosql_tenant(){
          global $conn;
          $address=$_SESSION['t_address'];
          $unit=$_SESSION['t_unit'];
   

          $sql="SELECT pid from property where p_address='{$address}'";
          $result0=mysqli_query($conn,$sql);
          $pid=mysqli_fetch_array($result0,MYSQLI_NUM)[0];

       if($unit=="Enter Unit....."){
       $sql1="SELECT tenant_id from live where parcel_id='{$pid}' ";
  
          $result1=mysqli_query($conn,$sql1);
         while($tid=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
           echo "tid".$tid['tenant_id'];
           

         };
         
       
          //$_SESSION['t_id']=$tid;

       }else{
          $sql1="SELECT tenant_id from live where parcel_id='{$pid}' and unit={$unit} ";
  
          $result1=mysqli_query($conn,$sql1);
          $tid=mysqli_fetch_array($result1,MYSQLI_NUM)[0];
         // $_SESSION['t_id']=$tid;
              $sql2="SELECT * from  tenant where tid = {$tid} ";
          $result2=mysqli_query($conn,$sql2);
        }
        

      


        return $result2;

     


   }
   function dosql_tenant1(){
       global $conn;
        $tid=$_SESSION['add_mm'];
          $sql3="SELECT * from addtional_member where tenant_id={$tid} ";
          $result3=mysqli_query($conn,$sql3);
         return $result3;   
   }
    function dosql_tenant2(){//delete previous tenant
       global $conn;
        $tid=$_SESSION['add_mm'];
          $sql3="SELECT * from addtional_member where tenant_id={$tid} ";
          $result3=mysqli_query($conn,$sql3);
         return $result3;   
   }

   //do sql of fee.php
   function dosql_fee(){
    global $conn;
       $paid=$_SESSION['pay_not'];
       if($paid=='All'){
        $sql4="SELECT * FROM owner_fee";
        $result4=mysqli_query($conn,$sql4);



       return $result4;
     
       }else if($paid=='N'){
     $sql5="SELECT * FROM owner_fee where paid='N' ";
        $result5=mysqli_query($conn,$sql5);
        return $result5;
       }else if($paid='Y'){
          $sql6="SELECT * FROM owner_fee where paid='Y' ";
        $result6=mysqli_query($conn,$sql6);
        return $result6;
       }
   }
  //alert by email
   function email_alert(){
    global $conn;



$owner_id=$_SESSION['o_id'];

for($i=0;$i<count($owner_id);$i++){
      $sql1="SELECT owner_name from property_owner where owner_id='{$owner_id[$i]}' ";
      
            $result1=mysqli_query($conn,$sql1);
            $owner_name=mysqli_fetch_array($result1,MYSQLI_NUM)[0];

             $sql2="SELECT email from property_owner where owner_id='{$owner_id[$i]}' ";
        
            $result2=mysqli_query($conn,$sql2);
            $email=mysqli_fetch_array($result2,MYSQLI_NUM)[0];
          echo $owner_name.$email;

          //get email content from db
          $sql3="SELECT * FROM email";
           $result3=mysqli_query($conn,$sql3);
           $content=mysqli_fetch_array($result3,MYSQLI_NUM)[1];
           ECHO $content;
$to = $email;
$subject = "West Homestead Borough Alert";
$name = "Dear ".$owner_name.",\r\r";
$txt=$name.$content."\r\r\r\r"."Regards"."\r\r"."West Homestead Borough";
$headers = "From: haw65@pitt.edu" . "\r\n" ;

mail($to,$subject,$txt,$headers);
}




   }
?>