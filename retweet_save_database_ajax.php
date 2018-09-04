<?php
  session_start();

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  $time=date("H:i:s");
  $date=date('Y-m-d');

  $_SESSION['retweet_username']=substr($_POST['username'], 2);

  $query2=mysql_query("select * from $_SESSION[username]_tweets where tweet_id='$_POST[tweet_id]'");

  if(($num2=mysql_num_rows($query2)) < 1)
  {

    mysql_query("insert into $_SESSION[username]_tweets(tweet_id,username,full_name,time,date,tweet,retweeted) values('$_POST[tweet_id]','$_SESSION[retweet_username]','$_SESSION[full_name]','$time','$date','$_POST[tweet]','yes')");

    mysql_query("update $_SESSION[retweet_username]_tweets set retweet=retweet+1 where tweet_id='$_POST[tweet_id]'");
  }

?>