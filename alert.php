  <?php include("./includes/mysql_connect.php"); ?>
   <?php require_once("./includes/functions.php");?>

<?php
   global $conn;

$owner_id=$_SESSION['o_id'];

for($i=0;$i<count($owner_id);$i++){
      $sql1="SELECT owner_name from property_owner where owner_id='{$owner_id[$i]}' ";
      
            $result1=mysqli_query($conn,$sql1);
            $owner_name=mysqli_fetch_array($result1,MYSQLI_NUM)[0];

             $sql2="SELECT email from property_owner where owner_id='{$owner_id[$i]}' ";
        
            $result2=mysqli_query($conn,$sql2);
            $email=mysqli_fetch_array($result2,MYSQLI_NUM)[0];
          //echo $owner_name.$email;

          //get email content from db
          $sql3="SELECT * FROM email";
           $result3=mysqli_query($conn,$sql3);
           $content=mysqli_fetch_array($result3,MYSQLI_NUM)[1];
           //ECHO $content;


            require("./PHPMailer/PHPMailerAutoload.php");
           $mail=new PHPMailer();
           $mail->IsSMTP();
           $mail->Host = "email-smtp.us-west-2.amazonaws.com";
           //$mail->Username="AKIAI2MSKPKDBXX577BQ";
           //$mail->Password="AgimD4vJ/rQCf6TiAELAjxILiPy2cg7eFUegTf0k2NID";
           $mail ->SetFrom('haw65@pitt.edu','Hao Wu');
           $mail->AddAddress($email,$owner_name);
           $mail->Subject ="West Homestead Alert";
           $mail->Body =$content;
           if(!$mail->Send()){
   echo 'Message was not sent.';

     echo 'Mailer error: ' . $mail->ErrorInfo;
           }else{
            echo 'Message has been sent.';
           }

/**
$to = $email;
$subject = "West Homestead Borough Alert";
$name = "Dear ".$owner_name.",\r\r";
$txt=$name.$content."\r\r\r\r"."Regards"."\r\r"."West Homestead Borough";
$headers = "From: haw65@pitt.edu" . "\r\n" ;
if(mail($to,$subject,$txt,$headers))
  {echo "send email successful";}else {echo "not sent";}
**/
}
?>
