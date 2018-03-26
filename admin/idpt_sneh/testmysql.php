<?php
   $dbhost = 'localhost';
   $dbuser = '';
   $dbpass = '';
   $dbname = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $selected = mysql_select_db($dbname,$conn) ;
   //use $dbname;   
   $sql = 'SELECT * FROM idptlogin';
  
   $retval = mysql_query( $sql, $conn);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   // , $conn

   while($row = mysql_fetch_array($retval)) {
      $fname=$row['username'];
      $pass=$row['password'];
      echo $fname;
      echo $pass;
      
      if($fname=='' && $pass=='')
      {
         echo "successs";
         //open the updateform.html from here
         echo "<script>document.location='updateform.html' </script>";
      }
      else
      {
         echo " gm";
      }
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>