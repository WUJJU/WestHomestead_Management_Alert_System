  <?php include("./includes/mysql_connect.php"); ?>

  <?php require_once("./includes/session.php"); ?>
<?php include("./includes/functions.php");?>
<?php
$status=confirm_logged_in();
echo "status of index.php is:";
echo $status;
if($status!=1){
  header("location:login.php");

}
?>
  <html>

  <head>
    <title>West Homestead Property Management2</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="CSS/style/style.css" title="style" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>

    <script type="text/javascript">

    window.onload=function(){
     var ownerid = window.location.search.match(/ownerid=(\w+)/);
     var address=window.location.search.match(/search_field=(\w+)/);

     if(ownerid) {
      document.getElementById("content1").style.display="initial";
    }
    if(address){
      document.getElementById("content0").style.display="initial";
    }
  }
  function close_search_info(){

   document.getElementById("content0").style.display="none";

 }



function pass(name){
  window.location.href="index.php?ownerid="+name;




}
function show_owner_info() {
 document.getElementById("content1").style.display="initial";
 document.getElementById("content2").style.display="none";


}

function show_property_info(){
 document.getElementById("content1").style.display="none";
 document.getElementById("content2").style.display="initial";

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
          <li class="selected"><a href="index.php">Property</a></li>
          <li><a href="tenant.php">Tenant</a></li>
          <li><a href="fee.php">Fee</a></li>

        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Search</h3>
        <form method="get" action="index.php" id="search_form">
          <p>
            <input id="address_search" class="search" type="text" name="search_field" value="Enter Address....." onfocus="this.value=''"/>
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="CSS/style/search.png" alt="submit" title="Search" />
          </p>
        </form>
        <h3>Other Functions</h3>
        <ul>
          <li><a href="add_property.php">Add new Property</a></li>
          <li><a href="">Modify Property</a></li>

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->
        <div id="content0" style="display:none">
         <?php 

         $address=$_GET['search_field'];

         $sql="SELECT owner_name,owner_address,city,ZIP,telephone,cellphone,email from property_owner where owner_id in(
           Select owner_id from property  where p_address = '".$address."' )";

  $result=mysqli_query($conn,$sql);

  echo "<table border='0'><tr><th >Owner Name</th><th>Owner Address</th><th>City</th><th>ZIP</th><th>Telephone</th><th>Cellphone</th><th>Email</th></tr>";
  while ($row = mysqli_fetch_array($result)) {

    echo "<tr><td>".$row['owner_name']."</td>";
    echo "<td>".$row['owner_address']."</td>";
    echo "<td>".$row['city']."</td>";
    echo "<td>".$row['ZIP']."</td>";
    echo "<td>".$row['telephone']."</td>";
    echo "<td>".$row['cellphone']."</td>";
    echo "<td>".$row['email']."</td>";




  } 
  echo "</tr></table>";
  echo "<input type='button' value='Close' onclick='close_search_info()' />";



  ?>

</div>

<div id="content1" style="display:none;">

 <?php 

 $oid=$_GET['ownerid'];

 $sql="SELECT owner_name,owner_address,city,ZIP,telephone,cellphone,email from property_owner  where owner_id='".$oid."' ";

 $result=mysqli_query($conn,$sql);

 echo "<table border='0'><tr><th >Owner Name</th><th>Owner Address</th><th>City</th><th>ZIP</th><th>Telephone</th><th>Cellphone</th><th>Email</th></tr>";
 while ($row = mysqli_fetch_array($result)) {

  echo "<tr><td>".$row['owner_name']."</td>";
  echo "<td>".$row['owner_address']."</td>";
  echo "<td>".$row['city']."</td>";
  echo "<td>".$row['ZIP']."</td>";
  echo "<td>".$row['telephone']."</td>";
  echo "<td>".$row['cellphone']."</td>";
  echo "<td>".$row['email']."</td>";




} 
echo "</tr></table>";
echo "<input type='button' value='Close' onclick='show_property_info()' />";



?>
</div>
<div id="content2" style="display:inline;">
  <?php 


  $sql="SELECT pid,p_address,units,owner_name,P.owner_id from property P, property_owner PO where P.owner_id=PO.owner_id";

  $result=mysqli_query($conn,$sql);

  echo "<table border='0'><tr><th >Procel ID</th><th>Property Address</th><th>Units</th><th>Owner</th></tr>";
  while ($row = mysqli_fetch_array($result)) {

    echo "<tr><td>".$row['pid']."</td>";
    echo "<td>".$row['p_address']."</td>";
    echo "<td>".$row['units']."</td>";
    echo "<form action='' method='get'>";
    echo "<td><a onclick='pass(\"$row[owner_id]\");'>".$row['owner_name']."</a></td>";
    echo "</form>";

  } 
  echo "</tr></table>";



  ?>
</div>




</div>
<div id="content_footer"></div>
<div id="footer">
  Copyright &copy; West Homestead
</div>
</div>
</body>
</html>
