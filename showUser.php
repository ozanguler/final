<?php
include 'dbconnect.php';

     $profname = "SELECT prof_eko_id, prof_name, prof_lastname FROM professors";
     $result = $DBcon->query($profname);

?>

<html>
<head>
<script src="jquery.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


</head>
<body>
<p id="uygar" >uygar</p>
<form>
<select id="prof"  type="text" placeholder="select professor" name="prof">
      <?php
      while($row = $result->fetch_assoc()) 
      {
        ?>
        <option  value="<?php echo $row['prof_eko_id']; ?>"><?php echo $row['prof_name'] . ' ' .$row['prof_lastname']; ?></option>
        <?php
      }
      ?>
    </select>

</form>
<br>
<input type="submit" value="GÖNDER" id="gonder"/>
          <div style="" id="sonuc">sadas</div>



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