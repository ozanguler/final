<?php
session_start();
include 'dbconnect.php';


$gelen1 = $_POST['p'];
$sql = "SELECT * FROM professors WHERE prof_eko_id = '$gelen1' ";
$result = $DBcon->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    $prof_con=$row["prof_con"];
    
  }
} else {
  echo "0 results";
}

$prof_name_sql = "SELECT prof_eko_id, prof_name, prof_lastname FROM professors WHERE prof_eko_id='$gelen1'";

$result = $DBcon->query($prof_name_sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    $prof_fullname = $row['prof_name'].' '.$row['prof_lastname'];
  }
} else {
  echo "0 results";
}


function condition_goster(){
  include 'prof_condition.php';
}

$gelen1 = $_POST['p'];
echo "$prof_fullname";



function select($day,$start_time) {
  include 'dbconnect.php';


  $gelen1 = $_POST['p'];

  $sql = "SELECT prof_eko_id,course_code,room_number FROM prof_schedule WHERE  prof_eko_id='$gelen1' && day='$day' && start_time='$start_time'";
  $result = $DBcon->query($sql);


  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
      echo   $row["course_code"]."<br>". $row["room_number"];


    }

  } else {
    echo "empty";
  }

}


function select2($day,$start_time) {
  include 'dbconnect.php';
  $gelen1 = $_POST['p'];

  $sql = "SELECT prof_eko_id,course_code,room_number FROM prof_schedule WHERE  prof_eko_id='$gelen1' && day='$day' && start_time='$start_time'";
  $result = $DBcon->query($sql);


  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
      echo   $row["course_code"];


    }

  } else {
    echo "empty";
  }

}


?>
<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <div style="width: 100px;" id="situationpanel" style="background-color: #4caf50;">
    <h5 id="situation"><?php echo $prof_con;?></h5>
  </div>

  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div  class="modal-content">
      <span class="close">&times;</span>
      <p id="professors_name" value="<?php echo $prof_fullname;?>"><?php echo $prof_fullname;?></p>
      <form action="appointment_insert.php" method="POST">
        <input style="display: none;" value="<?php echo $prof_fullname;?>" type="text" name="p_name">     
        <input style="display: none;" value="<?php echo $gelen1;?>" type="text" name="prof_eko_id">

        <label>Day&Time</label>
        <select class="browser-default" id="time" name="time">
          <option disabled selected>Choose your option</option>
          <option id="op1" ></option>
          <option id="op2" ></option>
          <option id="op3" ></option>
          <option id="op4" ></option>
        </select>
        <br>
        <br>
        subject:<input id="subject" type="text" name="subject">
        <br>
        <div  style="text-align:center" >
          <input id="appointment_button" type="submit">
        </div>


      </form>

    </div>


  </div>

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
        <td  class="monday-9" id="<?php select2("monday","9:00") ?>" onclick="fun('monday-9')" ><?php select("monday","9:00") ?> </td>
        <td class="tuesday-9" id="<?php select2("tuesday","9:00") ?>" onclick="fun('tuesday-9')" ><?php select("tuesday","9:00") ?></td>
        <td class="wednesday-9" id="<?php select2("wednesday","9:00") ?>" onclick="fun('wednesday-9')" ><?php select("wednesday","9:00") ?> </td>
        <td class="thursday-9" id="<?php select2("thursday","9:00") ?>" onclick="fun('thursday-9')" ><?php select("thursday","9:00") ?></td>
        <td class="friday-9" id="<?php select2("friday","9:00") ?>" onclick="fun('friday-9')" ><?php select("friday","9:00") ?> </td>

      </tr>
      <tr>
        <td>10:00-10:50 </td>
        <td class="monday-10" id="<?php select2("monday","10:00") ?>" onclick="fun('monday-10')" ><?php select("monday","10:00") ?> </td>
        <td class="tuesday-10" id="<?php select2("tuesday","10:00") ?>" onclick="fun('tuesday-10')" ><?php select("tuesday","10:00") ?> </td>
        <td class="wednesday-10" id="<?php select2("wednesday","10:00") ?>" onclick="fun('wednesday-10')" ><?php select("wednesday","10:00") ?> </td>
        <td class="thursday-10" id="<?php select2("thursday","10:00") ?>" onclick="fun('thursday-10')" ><?php select("thursday","10:00") ?> </td>
        <td class="friday-10" id="<?php select2("friday","10:00") ?>" onclick="fun('friday-10')" ><?php select("friday","10:00") ?> </td>

      </tr>
      <tr>
        <td>11:00-11:50</td>
        <td class="monday-11" id="<?php select2("monday","11:00") ?>" onclick="fun('monday-11')" ><?php select("monday","11:00") ?> </td>
        <td class="tuesday-11" id="<?php select2("tuesday","11:00") ?>" onclick="fun('tuesday-11')" ><?php select("tuesday","11:00") ?> </td>
        <td class="wednesday-11" id="<?php select2("wednesday","11:00") ?>" onclick="fun('wednesday-11')" ><?php select("wednesday","11:00") ?> </td>
        <td class="thursday-11" id="<?php select2("thursday","11:00") ?>" onclick="fun('thursday-11')" ><?php select("thursday","11:00") ?> </td>
        <td class="friday-11" id="<?php select2("friday","11:00") ?>" onclick="fun('friday-11')" ><?php select("friday","11:00") ?> </td>

      </tr>
      <tr>
        <td>12:00-12:50 </td>
        <td class="monday-12" id="<?php select2("monday","12:00") ?>" onclick="fun('monday-12')" ><?php select("monday","12:00") ?> </td>
        <td class="tuesday-12" id="<?php select2("tuesday","12:00") ?>" onclick="fun('tuesday-12')" ><?php select("tuesday","12:00") ?> </td>
        <td class="wednesday-12" id="<?php select2("wednesday","12:00") ?>" onclick="fun('wednesday-12')" ><?php select("wednesday","12:00") ?> </td>
        <td class="thursday-12" id="<?php select2("thursday","12:00") ?>" onclick="fun('thursday-12')" ><?php select("thursday","12:00") ?> </td>
        <td class="friday-12" id="<?php select2("friday","12:00") ?>" onclick="fun('friday-12')" ><?php select("friday","12:00") ?> </td>

      </tr>
      <tr>
        <td>13:00-13:50 </td>
        <td class="monday-13" id="<?php select2("monday","13:00") ?>" onclick="fun('monday-13')" ><?php select("monday","13:00") ?> </td>
        <td class="tuesday-13" id="<?php select2("tuesday","13:00") ?>" onclick="fun('tuesday-13')" ><?php select("tuesday","13:00") ?> </td>
        <td class="wednesday-13" id="<?php select2("wednesday","13:00") ?>" onclick="fun('wednesday-13')" ><?php select("wednesday","13:00") ?> </td>
        <td class="thursday-13" id="<?php select2("thursday","13:00") ?>" onclick="fun('thursday-13')" ><?php select("thursday","13:00") ?> </td>
        <td class="friday-13" id="<?php select2("friday","13:00") ?>" onclick="fun('friday-13')" ><?php select("friday","13:00") ?> </td>

      </tr>
      <tr>
        <td>14:00-14:50 </td>
        <td class="monday-14" id="<?php select2("monday","14:00") ?>" onclick="fun('monday-14')" ><?php select("monday","14:00") ?> </td>
        <td class="tuesday-14" id="<?php select2("tuesday","14:00") ?>" onclick="fun('tuesday-14')" ><?php select("tuesday","14:00") ?> </td>
        <td class="wednesday-14" id="<?php select2("wednesday","14:00") ?>" onclick="fun('wednesday-14')" ><?php select("wednesday","14:00") ?> </td>
        <td class="thursday-14" id="<?php select2("thursday","14:00") ?>" onclick="fun('thursday-14')" ><?php select("thursday","14:00") ?> </td>
        <td class="friday-14" id="<?php select2("friday","14:00") ?>" onclick="fun('friday-14')" ><?php select("friday","14:00") ?> </td>
      </tr>
      <tr>
        <td>15:00-15:50</td>
        <td class="monday-15" id="<?php select2("monday","15:00") ?>" onclick="fun('monday-15')" ><?php select("monday","15:00") ?> </td>
        <td class="tuesday-15" id="<?php select2("tuesday","15:00") ?>" onclick="fun('tuesday-15')" ><?php select("tuesday","15:00") ?> </td>
        <td class="wednesday-15" id="<?php select2("wednesday","15:00") ?>" onclick="fun('wednesday-15')" ><?php select("wednesday","15:00") ?> </td>
        <td class="thursday-15" id="<?php select2("thursday","15:00") ?>" onclick="fun('thursday-15')" ><?php select("thursday","15:00") ?> </td>
        <td class="friday-15" id="<?php select2("friday","15:00") ?>" onclick="fun('friday-15')" ><?php select("friday","15:00") ?> </td>

      </tr>
      <tr>
       <td>16:00-16:50</td>
       <td class="monday-16" id="<?php select2("monday","16:00") ?>" onclick="fun('monday-16')" ><?php select("monday","16:00") ?> </td>
       <td class="tuesday-16" id="<?php select2("tuesday","16:00") ?>" onclick="fun('tuesday-16')" ><?php select("tuesday","16:00") ?> </td>
       <td class="wednesday-16" id="<?php select2("wednesday","16:00") ?>" onclick="fun('wednesday-16')" ><?php select("wednesday","16:00") ?> </td>
       <td class="thursday-16" id="<?php select2("thursday","16:00") ?>" onclick="fun('thursday-16')" ><?php select("thursday","16:00") ?> </td>
       <td class="friday-16" id="<?php select2("friday","16:00") ?>" onclick="fun('friday-16')" ><?php select("friday","16:00") ?> </td>

     </tr>
     <tr>
      <td>17:00-17:50</td>
      <td class="monday-17" id="<?php select2("monday","17:00") ?>" onclick="fun('monday-17')" ><?php select("monday","17:00") ?> </td>
      <td class="tuesday-17" id="<?php select2("tuesday","17:00") ?>" onclick="fun('tuesday-17')" ><?php select("tuesday","17:00") ?> </td>
      <td class="wednesday-17" id="<?php select2("wednesday","17:00") ?>" onclick="fun('wednesday-17')" ><?php select("wednesday","17:00") ?> </td>
      <td class="thursday-17" id="<?php select2("thursday","17:00") ?>" onclick="fun('thursday-17')" ><?php select("thursday","17:00") ?> </td>
      <td class="friday-17" id="<?php select2("friday","17:00") ?>" onclick="fun('friday-17')" ><?php select("friday","17:00") ?> </td>

    </tr>
  </tbody>
</table>  


<script type="text/javascript">
var x=document.getElementById("situation").innerHTML;


if(x=="Busy"){



  document.getElementById("situationpanel").style.backgroundColor="#f44336";

}

else if(x=="Available"){

  document.getElementById("situationpanel").style.backgroundColor="#4caf50";


}
else if(x=="Inclass"){

  document.getElementById("situationpanel").style.backgroundColor="#2196f3";

}
else if(x=="Meeting"){

  document.getElementById("situationpanel").style.backgroundColor="#fdd835 ";

}

var y= document.getElementsByClassName("m-9")[0].id;

document.write(y);

function fun(x){


  document.getElementById('op1').innerHTML=x+":00";
  document.getElementById('op2').innerHTML=x+":15";
  document.getElementById('op3').innerHTML=x+":30";
  document.getElementById('op4').innerHTML=x+":45";



  var y= document.getElementsByClassName(x)[0].id;

  if(y==='office hour')
  {
          // Get the modal

          var modal = document.getElementById('myModal');

          modal.style.display="block";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



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
}


}

</script>


</body>

</html>
