


<?php
session_start();
include 'dbconnect.php';


function condition_goster(){
  include 'prof_condition.php';
}

    $gelen1 = $_POST['p'];
    echo "$gelen1";

function select($day,$start_time) {
  include 'dbconnect.php';
    $gelen1 = $_POST['p'];


  $sql = "SELECT prof_eko_id,course_code,room_number FROM prof_schedule WHERE  prof_eko_id='$gelen1' && day='$day' && start_time='$start_time'";
  
  $result = $DBcon->query($sql);


  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
      echo   $row["course_code"]. "<br>". $row["room_number"];
    }
  } 
  else {
    echo "0 results";
  }
}

?>

<style type="text/css">
  table, th, td {
    border: 1px solid black;
    height: 50px;

    
  }
</style>
<!DOCTYPE html>
<html>


<body>
  <table style="width: 75%; position: center">
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
        <td id="m-9"> <?php select("monday","9:00") ?> </td>
        <td id="tu-9"><?php select("tuesday","9:00") ?> </td>
        <td id="w-9"><?php select("wednesday","9:00") ?> </td>
        <td id="th-9"> <?php select("thursday","9:00") ?></td>
        <td id="fr-9"><?php select("friday","9:00") ?> </td>

      </tr>
      <tr>
        <td>10:00-10:50 </td>
        <td id="m-10"> <?php select("monday","10:00") ?> </td>
        <td id="tu-10"><?php select("tuesday","10:00") ?> </td>
        <td id="w-10"><?php select("wednesday","10:00") ?> </td>
        <td id="th-10"><?php select("thursday","10:00") ?> </td>
        <td id="fr-10"><?php select("friday","10:00") ?> </td>

      </tr>
      <tr>
        <td>11:00-11:50</td>
        <td id="m-11"> <?php select("monday","11:00") ?></td>
        <td id="tu-11"><?php select("tuesday","11:00") ?> </td>
        <td id="w-11"> <?php select("wednesday","11:00") ?></td>
        <td id="th-11"><?php select("thursday","11:00") ?> </td>
        <td id="fr-11"> <?php select("friday","11:00") ?></td>

      </tr>
      <tr>
        <td>12:00-12:50 </td>
        <td id="m-12"><?php select("monday","12:00") ?> </td>
        <td id="tu-12"><?php select("tuesday","12:00") ?> </td>
        <td id="w-12"><?php select("wednesday","12:00") ?> </td>
        <td id="th-12"> <?php select("thursday","12:00") ?></td>
        <td id="fr-12"><?php select("friday","12:00") ?></td>

      </tr>
      <tr>
        <td>13:00-13:50 </td>
        <td id="m-13"> <?php select("monday","13:00") ?> </td>
        <td id="tu-13"><?php select("tuesday","13:00") ?> </td>
        <td id="w-13"><?php select("wednesday","13:00") ?> </td>
        <td id="th-13"><?php select("thursday","13:00") ?> </td>
        <td id="fr-13"> <?php select("friday","13:00") ?></td>

      </tr>
      <tr>
        <td>14:00-14:50 </td>
        <td id="m-14"><?php select("monday","14:00") ?> </td>
        <td id="tu-14"> <?php select("tuesday","14:00") ?></td>
        <td id="w-14"><?php select("wednesday","14:00") ?> </td>
        <td id="th-14"><?php select("thursday","14:00") ?> </td>
        <td id="fr-14"><?php select("friday","14:00") ?> </td>

      </tr>
      <tr>
        <td>15:00-15:50</td>
        <td id="m-15"><?php select("monday","15:00") ?> </td>
        <td id="tu-15"><?php select("tuesday","15:00") ?> </td>
        <td id="w-15"><?php select("wednesday","15:00") ?> </td>
        <td id="th-15"><?php select("thursday","15:00") ?> </td>
        <td id="fr-15"><?php select("friday","15:00") ?></td>

      </tr>
      <tr>
       <td>16:00-16:50</td>
       <td id="m-16"><?php select("monday","16:00") ?> </td>
       <td id="tu-16"><?php select("tuesday","16:00") ?> </td>
       <td id="w-16"> <?php select("wednesday","16:00") ?></td>
       <td id="th-16"><?php select("thursday","16:00") ?> </td>
       <td id="fr-16"> <?php select("friday","16:00") ?></td>

     </tr>
     <tr>
      <td>17:00-17:50</td>
      <td id="m-17"><?php select("monday","17:00") ?> </td>
      <td id="tu-17"><?php select("tuesday","17:00") ?> </td>
      <td id="w-17"><?php select("wednesday","17:00") ?> </td>
      <td id="th-17"><?php select("thursday","17:00") ?> </td>
      <td id="fr-17""> <?php select("friday","17:00") ?></td>

    </tr>

  </tbody>
</table>



</body>

</html>
