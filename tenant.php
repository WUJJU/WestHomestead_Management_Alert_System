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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>

    <script type="text/javascript">
    

    window.onload=function(){
     var t_address = window.location.search.match(/t_address=(\w+)/);
     var tid=window.location.search.match(/tid=(\w+)/);

     if(t_address) {
      document.getElementById("content1").style.display="initial";
    }
      if(tid) {
      document.getElementById("content1").style.display="initial";
      document.getElementById("content2").style.display="initial";
    }

 
  }




   
  function close_search_info(){

   document.getElementById("content0").style.display="none";

 }



function pass(name){
  window.location.href="tenant.php?tid="+name;




}

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
          <li class="selected"><a href="tenant.php">Tenant</a></li>
          <li><a href="fee.php">Fee</a></li>

        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
        <h3>Other Functions</h3>
        <ul>
          <li><a href="add_tenant.php">Add new Tenant</a></li>
          <li><a href="modify_tenant.php">Change Info of Tenant</a></li>
 

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->
        <div id="content0" style="display:initial">
       <h3>Search</h3>
        <form method="get" action="tenant.php" id="search_form">
          <p>
            <input id="address_search" class="search1" type="text" name="t_address" value="Enter Tenant's Address....." onfocus="this.value=''"/>
            <input id="address_search" class="search" type="text" name="t_unit" value="Enter Unit....." onfocus="this.value=''"/>
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="CSS/style/search.png" alt="submit" title="Search" />
          </p>
        </form>
       </div>

<div id="content1" style="display:none;">
      <?php
          $address=$_GET['t_address'];
          $unit=$_GET['t_unit'];
                 
          //$_SESSION['t_address']=$address;
          //$_SESSION['t_unit']=$unit;
       //$result2=dosql_tenant();
        

          $sql="SELECT pid from property where p_address='{$address}'";
          $result0=mysqli_query($conn,$sql);
          $pid=mysqli_fetch_array($result0,MYSQLI_NUM)[0];

       if($unit=="Enter Unit....."||$unit==""){
       $sql1="SELECT tenant_id from live where parcel_id='{$pid}' ";
  
          $result1=mysqli_query($conn,$sql1);
         while($tid=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    
           $sql2="SELECT * from  tenant where tid = {$tid['tenant_id']} ";
          $result2=mysqli_query($conn,$sql2);
               echo "<table><tr><th>Name on Lease</th><th>Cellphone</th><th>email</th><th>Additional Member</th></tr>";
          while( $row=mysqli_fetch_array($result2,MYSQLI_NUM)){
              echo "<tr><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td><td>{$row[4]}</td>";

             if($row[4]=='Y'){
            $_SESSION['add_mm']=$row[0];
            $result3=dosql_tenant1();
         

         echo "<table><tr><th>Name</th><th>Under 18?</th></tr>";
          while( $row1=mysqli_fetch_array($result3,MYSQLI_NUM)){
              echo "<tr><td>{$row1[1]}</td><td>{$row1[2]}</td>";
          }
          echo "</tr></table>";
          }

          }
          echo "</tr></table>";
           

         };
         
       
          //$_SESSION['t_id']=$tid;

       }else{
          $sql1="SELECT tenant_id from live where parcel_id='{$pid}' and unit={$unit} ";
  
          $result1=mysqli_query($conn,$sql1);
          $tid=mysqli_fetch_array($result1,MYSQLI_NUM)[0];
         // $_SESSION['t_id']=$tid;
              $sql2="SELECT * from  tenant where tid = {$tid} ";
          $result2=mysqli_query($conn,$sql2);
               echo "<table><tr><th>Name on Lease</th><th>Cellphone</th><th>email</th><th>Additional Member</th></tr>";
          while( $row=mysqli_fetch_array($result2,MYSQLI_NUM)){
              echo "<tr><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td><td>{$row[4]}</td>";

             if($row[4]=='Y'){
            $_SESSION['add_mm']=$row[0];
            $result3=dosql_tenant1();
         

         echo "<table><tr><th>Name</th><th>Under 18?</th></tr>";
          while( $row1=mysqli_fetch_array($result3,MYSQLI_NUM)){
              echo "<tr><td>{$row1[1]}</td><td>{$row1[2]}</td>";
          }
          echo "</tr></table>";
          }

          }
          echo "</tr></table>";
        }
        


    

    
       
      ?>
 
</div>

<div id="content2" style="display:none;">
    
</div>


</div>
<!--
<div id="content_footer"></div>
<div id="footer">
  Copyright &copy; West Homestead
</div>
-->
</div>
</body>
</html>
