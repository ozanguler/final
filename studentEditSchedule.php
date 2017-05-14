<?php
session_start();
include_once 'dbconnect.php';

$deletesql = "DELETE FROM student_schedule WHERE student_eko_id=".$_SESSION['userSession'];

if ($DBcon->query($deletesql) === TRUE) {
    // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $DBcon->error;
}


if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM registered_users WHERE eko_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="http://code.jquery.com/jquery.js"></script>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Welcome - <?php echo $userRow['first_name']; ?></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

    <div id="lecturepanel">

      <?php 
      $lectures = "SELECT course_code, course_name FROM courses";
      $result = $DBcon->query($lectures);

      $rooms = "SELECT room_name FROM room_number";
      $result1 = $DBcon->query($rooms);
      ?>         

      <div class="input-field col s12">

        <label><b>Ders Kodu</b></label>
        <br>
        <select class="browser-default" id="Derskodu"  type="text" placeholder="Ders Kodu" name="Derskodu">
          <option value="" disabled selected>Choose your option</option>
          <?php
          while($row = $result->fetch_assoc()) 
          {
            ?>
            <option value="<?php echo $row['course_code']; ?>"><?php echo $row['course_code']; ?></option>
            <?php
          }
          ?>
        </select>
        
      </div>

      <div class="input-field col s12">
        <label><b>Ders Sınıfı</b></label>
        <br>
        <select class="browser-default" id="Derssınıfı" type="text" placeholder="Ders Sınıfı" name="Derssınıfı">
          <option value="" disabled selected>Choose your option</option>
          <?php
          while($row = $result1->fetch_assoc()) 
          {
            ?>
            <option value="<?php echo $row['room_name']; ?>"><?php echo $row['room_name']; ?></option>
            <?php
          }
          ?>
        </select>
        
      </div>
      <br>


    </div>
    
    <table>
      <tr>
        <td style="text-align:center">
          <a style="background-color:#ef7f2d" class="waves-effect waves-light btn" id="modalkyt" onClick="kaydet()">Kaydet</a>
        </td>
      </tr>
    </table>

  </div>

</div>


<body>

  <!-- Nav Bar -->
  <nav>
    <div style="background-color:#ef7f2d" class="nav-wrapper">
      <a class="brand-logo"><img height="64" src="img/navbarlogo.png"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="profhome2.php">&nbsp; <?php echo $userRow['first_name']. " " .$userRow['last_name']; ?></a></li>
        <li><a href="logout.php?logout"><i class="material-icons">power_settings_new</i></a></li>
      </ul>
    </div>
  </nav>
  <br>
  <table class="striped">
    <thead>
      <tr>
        <th>Day/Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday </th>
        <th>Thursday</th>
        <th>Friday</th>

      </tr>
    </thead>

    <tbody>
      <tr>
        <td>09:00-09:50 </td>
        <td id="m-9", onclick="myFunction('m-9')"> </td>
        <td id="tu-9", onclick="myFunction('tu-9')"> </td>
        <td id="w-9", onclick="myFunction('w-9')"> </td>
        <td id="th-9", onclick="myFunction('th-9')"> </td>
        <td id="fr-9", onclick="myFunction('fr-9')"> </td>

      </tr>
      <tr>
        <td>10:00-10:50 </td>
        <td id="m-10", onclick="myFunction('m-10')"> </td>
        <td id="tu-10", onclick="myFunction('tu-10')"> </td>
        <td id="w-10", onclick="myFunction('w-10')"> </td>
        <td id="th-10", onclick="myFunction('th-10')"> </td>
        <td id="fr-10", onclick="myFunction('fr-10')"> </td>

      </tr>
      <tr>
        <td>11:00-11:50</td>
        <td id="m-11", onclick="myFunction('m-11')"> </td>
        <td id="tu-11", onclick="myFunction('tu-11')"> </td>
        <td id="w-11", onclick="myFunction('w-11')"> </td>
        <td id="th-11", onclick="myFunction('th-11')"> </td>
        <td id="fr-11", onclick="myFunction('fr-11')"> </td>

      </tr>
      <tr>
        <td>12:00-12:50 </td>
        <td id="m-12", onclick="myFunction('m-12')"> </td>
        <td id="tu-12", onclick="myFunction('tu-12')"> </td>
        <td id="w-12", onclick="myFunction('w-12')"> </td>
        <td id="th-12", onclick="myFunction('th-12')"> </td>
        <td id="fr-12", onclick="myFunction('fr-12')"> </td>

      </tr>
      <tr>
        <td>13:00-13:50 </td>
        <td id="m-13", onclick="myFunction('m-13')"> </td>
        <td id="tu-13", onclick="myFunction('tu-13')"> </td>
        <td id="w-13", onclick="myFunction('w-13')"> </td>
        <td id="th-13", onclick="myFunction('th-13')"> </td>
        <td id="fr-13", onclick="myFunction('fr-13')"> </td>

      </tr>
      <tr>
        <td>14:00-14:50 </td>
        <td id="m-14", onclick="myFunction('m-14')"> </td>
        <td id="tu-14", onclick="myFunction('tu-14')"> </td>
        <td id="w-14", onclick="myFunction('w-14')"> </td>
        <td id="th-14", onclick="myFunction('th-14')"> </td>
        <td id="fr-14", onclick="myFunction('fr-14')"> </td>

      </tr>
      <tr>
        <td>15:00-15:50</td>
        <td id="m-15", onclick="myFunction('m-15')"> </td>
        <td id="tu-15", onclick="myFunction('tu-15')"> </td>
        <td id="w-15", onclick="myFunction('w-15')"> </td>
        <td id="th-15", onclick="myFunction('th-15')"> </td>
        <td id="fr-15", onclick="myFunction('fr-15')"> </td>

      </tr>
      <tr>
       <td>16:00-16:50</td>
       <td id="m-16", onclick="myFunction('m-16')"> </td>
       <td id="tu-16", onclick="myFunction('tu-16')"> </td>
       <td id="w-16", onclick="myFunction('w-16')"> </td>
       <td id="th-16", onclick="myFunction('th-16')"> </td>
       <td id="fr-16", onclick="myFunction('fr-16')"> </td>

     </tr>
     <tr>
      <td>17:00-17:50</td>
      <td id="m-17",  onclick="myFunction('m-17')"> </td>
      <td id="tu-17", onclick="myFunction('tu-17')"> </td>
      <td id="w-17", onclick="myFunction('w-17')"> </td>
      <td id="th-17", onclick="myFunction('th-17')"> </td>
      <td id="fr-17", onclick="myFunction('fr-17')"> </td>

    </tr>
  </tbody>
</table>
<table>
  <tr>
    <td style="text-align:center">
      <a style="background-color:#ef7f2d; text-aling:center" class="waves-effect waves-light btn" id="gonder" href="studenthome2.php">Gönder</a>
    </td>
  </tr>
</table>

<div style="display: none;" id="sonuc"></div>
<script>
function myFunction(x) {
          // Get the modal
          var modal = document.getElementById('myModal');

          var modalkyt = document.getElementById('modalkyt');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

//get radiobutton
var schudule_type = document.getElementsByName("schudule_type");

//get lecturepanel
var lecturepanel=document.getElementById("lecturepanel");
lecturepanel.style.display="none";


modal.style.display = "block";
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

lecturepanel.style.display="block";
modalkyt.onclick=function(){



  //var modal = document.getElementById('myModal');
  var derskodu =document.getElementById('Derskodu').value;
  var derssınıfı = document.getElementById('Derssınıfı').value;

  document.getElementById(x).value =derskodu+'!'+derssınıfı;
  document.getElementById(x).innerHTML =derskodu+"<br>"+derssınıfı;

  modal.style.display = "none";
}
}
$('#gonder').click(function(){ 
  var post_edilecek_veriler = 'm-9='+$('#m-9').val()+'&m-10='+$('#m-10').val()+'&m-11='+$('#m-11').val()+'&m-12='+$('#m-12').val()+'&m-13='+$('#m-13').val()+'&m-14='+$('#m-14').val()+'&m-15='+$('#m-15').val()+'&m-16='+$('#m-16').val()+'&m-17='+$('#m-17').val()+
  '&tu-9='+$('#tu-9').val()+'&tu-10='+$('#tu-10').val()+'&tu-11='+$('#tu-11').val()+'&tu-12='+$('#tu-12').val()+'&tu-13='+$('#tu-13').val()+'&tu-14='+$('#tu-14').val()+'&tu-15='+$('#tu-15').val()+'&tu-16='+$('#tu-16').val()+'&tu-17='+$('#tu-17').val()+'&w-9='+$('#w-9').val()+'&w-10='+$('#w-10').val()+'&w-11='+$('#w-11').val()+'&w-12='+$('#w-12').val()+'&w-13='+$('#w-13').val()+'&w-14='+$('#w-14').val()+'&w-15='+$('#w-15').val()+'&w-16='+$('#w-16').val()+'&w-17='+$('#w-17').val()+'&th-9='+$('#th-9').val()+'&th-10='+$('#th-10').val()+'&th-11='+$('#th-11').val()+'&th-12='+$('#th-12').val()+'&th-13='+$('#th-13').val()+'&th-14='+$('#th-14').val()+'&th-15='+$('#th-15').val()+'&th-16='+$('#th-16').val()+'&th-17='+$('#th-17').val()+
  '&fr-9='+$('#fr-9').val()+'&fr-10='+$('#fr-10').val()+'&fr-11='+$('#fr-11').val()+'&fr-12='+$('#fr-12').val()+'&fr-13='+$('#fr-13').val()+'&fr-14='+$('#fr-14').val()+'&fr-15='+$('#fr-15').val()+'&fr-16='+$('#fr-16').val()+'&fr-17='+$('#fr-17').val()
  ;  
  $.ajax({ 
    type:'POST',  
    url:'student_schedule_insert.php',  
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
