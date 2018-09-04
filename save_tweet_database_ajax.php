<?php
  session_start();

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  $time=date("H:i:s");
  $date=date('Y-m-d');

  $c1=explode("-",$date);
  $c=$c1[0].$c1[1].$c1[2];
  $d1=explode(":",$time);
  $d=$d1[0].$d1[1].$d1[2];
  $e=$_SESSION['username'].$c.$d;

  mysql_query("insert into $_SESSION[username]_tweets(tweet_id,username,full_name,time,date,tweet,retweet,favourite) values('$e','$_SESSION[username]','$_SESSION[full_name]','$time','$date','$_POST[tweet]',0,0)");
?>