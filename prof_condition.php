<!DOCTYPE html>
    <head>
    <script src="http://code.jquery.com/jquery.js"></script>  

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    </head>

    <body>
<div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
	<div class="row">
        <div class="col m3">
          <div id="situationpanel" class="card " style="background-color: #4caf50">
            <div class="card-content white-text">
              <span class="card-title">Current Situation </span>
              <h5 value"" id="situation" >Available</h5>
            </div>

           
          </div>
        </div>
      </div>
    


 <button id="busy" >Busy</button>
  <button id="Available">Available</button>
   <button id="Inclass" >Inclass</button>
    <button id="Meeting" >Meeting</button>

              <div id="sonuc"></div>

            

 

  <script type="text/javascript">
      



$('#busy').click(function(){ 


      document.getElementById("situation").innerHTML="Busy";
    document.getElementById("situationpanel").style.backgroundColor="#f44336";
    document.getElementById("situation").value="Busy";

    var post_edilecek_veriler = 'situation='+$('#situation').val();
      $.ajax({ 
          type:'POST',  
          url:'condition_update.php',  
          data:post_edilecek_veriler, 
          success: 
        function(cevap){ 
             $("#sonuc").html(cevap); 
        } 
      }); 
      

      }); 
$('#Available').click(function(){ 


       document.getElementById("situation").innerHTML="Available";
    document.getElementById("situationpanel").style.backgroundColor="#4caf50";
    document.getElementById("situation").value="Available";

    var post_edilecek_veriler = 'situation='+$('#situation').val();
      $.ajax({ 
          type:'POST',  
          url:'condition_update.php',  
          data:post_edilecek_veriler, 
          success: 
        function(cevap){ 
             $("#sonuc").html(cevap); 
        } 
      }); 
      

      }); 
$('#Inclass').click(function(){ 


   document.getElementById("situation").innerHTML="Inclass";
    document.getElementById("situationpanel").style.backgroundColor="#2196f3";
    document.getElementById("situation").value="Inclass";


    var post_edilecek_veriler = 'situation='+$('#situation').val();
      $.ajax({ 
          type:'POST',  
          url:'condition_update.php',  
          data:post_edilecek_veriler, 
          success: 
        function(cevap){ 
             $("#sonuc").html(cevap); 
        } 
      }); 
      

      }); 
$('#Meeting').click(function(){ 


     document.getElementById("situation").innerHTML="Meeting"; 
    document.getElementById("situationpanel").style.backgroundColor="#fdd835 ";
    document.getElementById("situation").value="Meeting";

    var post_edilecek_veriler = 'situation='+$('#situation').val();
      $.ajax({ 
          type:'POST',  
          url:'condition_update.php',  
          data:post_edilecek_veriler, 
          success: 
        function(cevap){ 
             $("#sonuc").html(cevap); 
        } 
      }); 
      

      }); 

  </script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  </html>
