  <?php include("./includes/mysql_connect.php"); ?>
   <?php require_once("./includes/functions.php");?>


<?php

email_alert();

?>

  <html>

  <head>
    <title>West Homestead Property Management</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="CSS/style/style.css" title="style" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>

    <script type="text/javascript">


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
          <li><a href="add_property.php"></a></li>
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
  


</div>
<div id="content2" style="display:initial;">
      
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
