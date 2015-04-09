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
     
   
</script>
<script >

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
       
        <h3></h3>
        <ul>
          <li><a href="edit_email.php"></a></li>
          <li><a href=""></a></li>

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->

        <div id="content0" style="display:initial">
       <h3>Edit Alert Email:</h3>
<form action="do_sql5.php" method="post">
        
<?php
 
 $sql="select * from email";
 $result=mysqli_query($conn,$sql);
 $content=mysqli_fetch_array($result,MYSQLI_NUM)[1];
echo "<textarea class='form-control col-md-12' rows='20' cols='50' name='e_content'>".$content."</textarea>";
?>
        
        <br><input type="submit" value="submit" id="new_email" /></form>
 
</div>

<div id="content1" style="display:none;">

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
