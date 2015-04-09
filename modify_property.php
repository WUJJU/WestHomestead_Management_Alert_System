<?php  require_once("./includes/session.php");?>
  <?php include("./includes/mysql_connect.php"); ?>
 
 



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
      var o_address =window.location.search.match(/owner_by_paddress=(\w+)/);
      if(o_address){
        document.getElementById("content2").style.display="initial";
      }
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
        
        <h3>Other Functions</h3>
        <ul>
          <li class="selected"><a href="add_property.php">Add new Property</a></li>
          <li><a href="modify_property.php">Modify Property Owner</a></li>

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->
      


<div id="content1" style="display:inline;">

    <h3>Search</h3>
        <form method="get" action="modify_property.php" id="search_form">
          <p>
            <input id="address_search" class="search" type="text" name="owner_by_paddress" value="Enter Address....." onfocus="this.value=''"/>
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="CSS/style/search.png" alt="submit" title="Search" />
          </p>
        </form>

</div>


<!--show the search result-->
<div id="content2" style="display:none;">
 <?php




         $address=$_GET['owner_by_paddress'];

         $sql="SELECT owner_name,owner_address,city,ZIP,cellphone,email from property_owner where owner_id in(
           Select owner_id from property  where p_address = '".$address."' )";
        $sql2="SELECT  owner_id from property  where p_address = '".$address."' ";
         $result=mysqli_query($conn,$sql);
         $result1=mysqli_query($conn,$sql2);
          $count=mysqli_fetch_array($result1,MYSQL_ASSOC);
          $_SESSION['oid']=$count['owner_id'];

  echo "<form method='post' action='do_sql2.php' >";
  
  while ($row = mysqli_fetch_array($result)) {
    echo "<b>Owner Name: </b></br>" ;
    echo "<input type='text' name='owner_name' value='".$row['owner_name']."' /></br>";
    echo "<b>Owner Address:</b> </br>";
      echo "<input type='text' name='owner_address' value='".$row['owner_address']."' /></br>";
      echo "<b>City:</b> </br>";
          echo "<input type='text' name='city' value='".$row['city']."' /></br>";
          echo "<b>ZIP:</b> </br>";
    echo "<input type='text' name='ZIP' value='".$row['ZIP']."' /></br>";
 
        echo "<b>Cellphone: </b></br>";
        echo "<input type='text' name='cellphone' value='".$row['cellphone']."' /></br>";
     echo "<b>Email:</b> </br>";
        echo "<input type='text' name='email' value='".$row['email']."' /></br>";





  } 
    
  echo "</p><input type='submit' value='submit'/></p></form>"
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
