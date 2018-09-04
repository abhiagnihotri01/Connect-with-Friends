<?php
  session_start();
  
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  $query=mysql_query("insert into $_SESSION[username]_following(username,full_name,image) values('$_SESSION[others_username]','$_SESSION[others_full_name]','accounts/$_SESSION[others_username]/profile_image.jpg')");
  $query1=mysql_query("insert into $_SESSION[others_username]_followers(username,full_name,image) values('$_SESSION[username]','$_SESSION[full_name]','accounts/$_SESSION[username]/profile_image.jpg')");

  if($query && $query1)
  {
  	$_SESSION['others_following']="Following";
  	echo $_SESSION['others_following'];
  }
?>