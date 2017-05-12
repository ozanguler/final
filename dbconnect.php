<?php

	 $DBhost = "localhost";
	 $DBuser = "root";
	 $DBpass = "kmlisk741-288";
	 $DBname = "newdb";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
