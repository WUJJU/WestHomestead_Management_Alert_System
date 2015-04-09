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
          <li class="selected"><a href="add_property.php">Add new Property</a></li>
          <li><a href="modify_property.php">Modify Property Owner</a></li>

        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->
      


<div id="content1" style="display:inline;">
  <form action="do_sql.php" method="post">
      <h3>Property Info:</h3><br><br>
      Parcel ID<br>
      <input type="text" name="pid"/></br>
      Property Address<br>
      <input type="text" name="p_address"/></br>
      Units<br>
      <input type="text" name="units"/></br>
      Catergory<br>
        <select id="cater" name="cater">
                <option value="Residential">Residential</option>
  <option value="Commercial">Commercial</option>
  <option value="Industrial">Industrial</option>
  <option value="Government">Government</option>

  <option value="Utilities">Utilities</option>
      </select>
      <h3>Owner's Info:</h3><br>
      Name<br><input type="text" name="owner_name"/></br>
      Address<br><input type="text" name="owner_address"/></br>
      City<br><input type="text" name="city"/></br>
      ZIP<br><input type="text" name="ZIP"/></br>
      Cellphone<br><input type="text" name="cellphone"/></br>
      Email<br><input type="text" name="email"/></br></br>
       
      <p><input type="submit" value="submit" />
  </form>
 
</div>




</div>
<div id="content_footer"></div>
<div id="footer">
  Copyright &copy; West Homestead
</div>
</div>
</body>
</html>
