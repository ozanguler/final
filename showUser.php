<?php
include 'dbconnect.php';

$profname = "SELECT prof_eko_id, prof_name, prof_lastname FROM professors";
$result = $DBcon->query($profname);

session_start();
$query = $DBcon->query("SELECT * FROM registered_users WHERE eko_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
?>

<html>
<head>
  <script src="jquery.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <!-- Nav Bar -->
  <nav>
    <div style="background-color:#ef7f2d" class="nav-wrapper">
      <a class="brand-logo"><img height="100%" src="img/navbarlogo.png"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="studenthome2.php">&nbsp; <?php echo $userRow['first_name']. " " .$userRow['last_name']; ?></a></li>
        <li><a href="logout.php?logout"><i class="material-icons">power_settings_new</i></a></li>
      </ul>
    </div>
  </nav>

  <table>
    <tr>
      <td>
        
          <select class="browser-default" id="prof"  type="text" placeholder="select professor" name="prof">
            <?php
            while($row = $result->fetch_assoc()) 
            {
              ?>
              <option  value="<?php echo $row['prof_eko_id']; ?>"><?php echo $row['prof_name'] . ' ' .$row['prof_lastname']; ?></option>
              <?php
            }
            ?>
          </select>

        
      </td>
      <td>
        <a style="background-color:#ef7f2d" class="waves-effect waves-light btn" id="gonder">Gönder</a>
      </td>
    </tr>
  </table>
  <div id="sonuc"></div>



  <script>
  $('#gonder').click(function(){ 
    var post_edilecek_veriler = 'p='+$('#prof').val(); 

    $.ajax({ 
      type:'POST',  
      url:'search.php',  
      data:post_edilecek_veriler, 
      success: 
      function(cevap){ 
       $("#sonuc").html(cevap); 
     } 
   }); 


  }); 
  </script>

</body>

</html>