<?php
  session_start();

  $_SESSION['others_start1']=0;

  //header("Location:login.php");

  $str=substr($_REQUEST['others_username'],2);

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  $query=mysql_query("select * from ".$str."_tweets");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['others_tweets_num']=$num;
  else
    $_SESSION['others_tweets_num']=0; 

  $query=mysql_query("select * from ".$str."_following");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['others_following_num']=$num;
  else
    $_SESSION['others_following_num']=0;

  $query=mysql_query("select * from ".$str."_followers");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['others_followers_num']=$num;
  else
    $_SESSION['others_followers_num']=0; 

  $_SESSION['others_full_name']=$_REQUEST['others_full_name'];
  $_SESSION['others_username']=$str;
  
?>