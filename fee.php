  <?php include("./includes/mysql_connect.php"); ?>
    <?php require_once("./includes/session.php"); ?>
  <?php require_once("./includes/functions.php");?>



  <html>

  <head>
    <title>West Homestead Property Management</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="CSS/style/style.css" title="style" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js">

    </script>

    <script type="text/javascript">

    window.onload=function(){
     var pay_not= window.location.search.match(/pay_not=(\w+)/);
     var address=window.location.search.match(/search_field=(\w+)/);

     if(pay_not) {
      document.getElementById("content1").style.display="initial";
    }
    if(address){
      document.getElementById("content0").style.display="initial";
    }
  }
  
</script>
<script >  
$(document).ready(function(){

  $("#a_email").click(function(){

    $.get("alert.php",function(){alert("Send email sucessfully");
  });

});
});

</script>
</head>

<body>

  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">West<span class="logo_colour">Homestead</span></a></h1>
          <h2>Property. Residents. Management System.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="index.php">Property</a></li>
          <li><a href="tenant.php">Tenant</a></li>
          <li class="selected"><a href="fee.php">Fee</a></li>

        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
        <h3>Other Functions</h3>
        <ul>
          <li><a href="edit_email.php">Edit Alert Email</a></li>
          <li><a href=""></a></li>

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->

        <div id="content0" style="display:initial">
       <h3>Permit Fee Check</h3>
        <form method="get" action="fee.php" id="search_form">
          <p>
            <select id="pay_not" name="pay_not">
  <option value="N">No</option>
  <option value="Y">Yes</option>
  <option value="All">All</option>
      </select>
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="CSS/style/search.png" alt="submit" title="Search" />
          </p>
        </form>

</div>

<div id="content1" style="display:none;">
     <?php 
         $pay_not=$_GET['pay_not'];
        $_SESSION['pay_not']=$pay_not;

        $result=dosql_fee();
        $o_id=array();
          $i=0;
     
 echo "<table border='0'><tr><th >Owner Name</th><th>Property Address</th><th>Fee Type</th><th>Date Issued</th><th>Paid</th></tr>";
 
          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

            
            $sql1="SELECT owner_name from property_owner where owner_id={$row['owner_id'] } ";
            $oid=$row['owner_id'];
          
            array_push($o_id,$oid);
          
            echo $o_id[$i];
            $result1=mysqli_query($conn,$sql1);
            $owner_name=mysqli_fetch_array($result1,MYSQLI_NUM)[0];
            
            $sql2="SELECT p_address from property where pid='{$row['parcel_id']}' ";
            $result2=mysqli_query($conn,$sql2);
            $p_address=mysqli_fetch_array($result2,MYSQLI_NUM)[0];

            $sql3="SELECT fee_type from fee_type where fee_id='{$row['fee_id']}' ";
            $result3=mysqli_query($conn,$sql3);
            $fee_type=mysqli_fetch_array($result3,MYSQLI_NUM)[0];

            $i++;

    echo "<tr><td>{$owner_name}</td>";
    echo "<td>{$p_address}</td>";
    echo "<td>{$fee_type}</td>";
    echo "<td>".$row['date_issued']."</td>";
    echo "<td>".$row['paid']."</td>";
  



  } 
  echo "</tr></table>";
       $_SESSION['o_id']=$o_id;

       if($_SESSION['pay_not']=='N'){
    


     echo "<input type='button' value='Send Email to Alert' id='a_email' />";

       }
    

    
     ?>


</div>




</div>
<!--
<div id="content_footer"></div>
<div id="footer">
  Copyright &copy; West Homestead
</div>
</div>
-->
</body>
</html>
