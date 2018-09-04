<?php
  session_start();
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");
  //echo $_REQUEST['u'];
  //if($_REQUEST['u'] == "amit")
  if(isset($_REQUEST['followers']))
  {
    mysql_query("delete from $_SESSION[username]_followers where username='$_REQUEST[followers]'");
    mysql_query("delete from $_REQUEST[followers]_following where username='$_SESSION[username]'");
  }
  else if(isset($_REQUEST['following']))
  {
    mysql_query("delete from $_SESSION[username]_following where username='$_REQUEST[following]'");
    mysql_query("delete from $_REQUEST[following]_followers where username='$_SESSION[username]'");	
  }
  
?>