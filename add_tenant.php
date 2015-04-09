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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <script type="text/javascript">

 
       var p1=" Additional Member's Name <input type='text' name='add_name[]'/></br>";
          var p2="Is Under 18? <select class='add_18' name='adult[]'></select>";
            var p3="<option value='N'>No</option><option value='Y'>Yes</option><option value='n/a'>N/A</option>";
          
$(document).ready(function(){
       
    $("#add_m").change(function(){
        if($(this).val() =="Y"){
      
        
             var p4="<input id='more_button' type='button' value='More' onclick='mem_add()' />";
  $("#p1").append(p1,p2,p4);
  $(".add_18").append(p3);
    
      }

    });
});

     function mem_add(){
       $("#p1").append("</br>",p1,p2); 
    $(".add_18").append(p3);

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
          <li class="selected"><a href="add_tenant.php">Add new Tenant</a></li>
          <li><a href="modify_tenant.php">Modify Tenant</a></li>

        </ul>
 
      </div>
      <div id="content">
        <!-- insert the page content here -->
      
   


<div id="content3" style="display:initial;">
  <form action="do_sql3.php" method="post">
      <h3>Tenant INFO:</h3><br><br>
      House Address<br><input type="text" name="t_address"/></br>
      Unit<br><input type="number" name="unit"/></br>
      Name on Lease<br><input type="text" name="name_onlease"/></br>
      Cellphone<br><input type="text" name="cellphone"/></br>
      Email<br><input type="text" name="email"/></br></br>

      Additional Memmber<br>
      <select id="add_m" name="add_member">
  <option value="N">No</option>
  <option value="Y">Yes</option>
  <option value="n/a">N/A</option>
      </select>

   
      <p id="p1"></p>
      <p id="p2"></p>
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
