<?php
  @session_start();

  $_SESSION['tweets_followers_following']="own_tweets.php";
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

?>
	
<style type="text/css">
	.account_and_language_setting3
	{
		background-color: white;
		width:600px;
		height: auto;
		border:1px solid #66757f;
        border-radius: 8px;
	}
	.account_headers3
	{
		width:100%;
		height: 70px;
		border-bottom:1px solid #eee;
	}
	.account_headers_heading3
	{
		color: #66757f;
		margin-top: 8px;
		margin-left: 8px;
		font-weight: lighter;
	}
	.account_headers_paragraph3
	{
		color: #8899a6;
		margin-top: 5px;
		margin-left: 8px;
		font-size: 14px;
	}
	.following_tweets3
	{
		width:100%;
		height:auto;
		padding-bottom: 5px;
	}
	.tweet3
	{
		width:100%;
		padding-bottom: 10px;
		border-top: 1px solid #e1e8ed;
		/*padding:10px 0 0 10px;*/
	}
	.tweet3:hover
	{
		background-color: #F7E5E5;
	}
	.following_profile_image3
	{
		width:50px;
		height:50px;
		border-radius: 6px;
		margin-left: 10px;
		margin-top: 10px;
		float:left;
	}
	.following_tweet_contents3
	{
		margin-left: 70px;
		padding-top: 8px;
	}
	.link123
	{
		text-decoration: none;
		display: inline-block;
		color: #66757f;
		font-size: 14px;
	}
	.following_full_name3
	{
		color: black;
		font-weight: bold;
		font-size: 17px;
	}
	.following_tweet3
	{
		color: black;
		font-weight: lighter;
		font-size: 14px;
	}
	.following_rep_ret_fav_link3
	{
		/*width: 55px;
		height: 25px;*/
		margin-top: 15px;
		padding-right: 40px;
		text-decoration: none;
		display: inline-block;
		text-align: center;
		color: #66757f;
	}
	.following_rep_ret_fav_link3:hover
	{
		color: red;
	}
	.following_rep_ret_fav_link3 img
	{
		width: 15px;
		height: 15px;
	}
	.retweet_class
	{
		color:#8899a6;
		margin-left: 70px;
		font-size: 14px;
		padding-top: 5px;
	}
	
</style>
	<div class="account_and_language_setting3">
		<div class="account_headers3">
			<h2 class="account_headers_heading3">Tweets</h2>
	        <p class="account_headers_paragraph3">Your tweets</p>
	    </div>

	    <div class="following_tweets3">

            <?php

              $query = mysql_query("select * from $_SESSION[username]_tweets order by date desc,time desc");
              if(($num = mysql_num_rows($query)) > 0)
              {
                 
                while($row=mysql_fetch_array($query))
                {
                
                if($row['username'] == $_SESSION['username'])
                {
                  echo "<div class='tweet3'>";
                  echo "<a href='#'>";
                  if(file_exists("accounts/$row[username]/profile_image.jpg"))
                    echo "<img class='following_profile_image3' src='accounts/$row[username]/profile_image.jpg'/>"; 
                  else
                    echo "<img class='following_profile_image3' src='images/profile_image1.jpg'/>";
                  echo "</a>";
                  echo "<div class='following_tweet_contents3'>";
                  echo "<a href='#' class='link123'><span class='following_full_name3'>$row[full_name]</span>";
                  echo "<span class='following_username3'> @$row[username]</span>";
                  echo "<span> - $row[date] $row[time]</span></a>";
                  echo "<p  class='following_tweet3'>$row[tweet]</p>";
                  echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/reply2.png'/><span> </span></a>";
                  echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/retweet1.png'/><span> $row[retweet]</span></a>";
                  echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/favourite2.png'/><span> $row[favourite]</span></a>";
                  echo "</div>";
                  echo "</div>";
                }
                else
                {
                  $query1 = mysql_query("select * from $row[username]_tweets where tweet_id='$row[tweet_id]'");

                  if($query1 && ($num1 = mysql_num_rows($query1)) > 0 && ($row1=mysql_fetch_array($query1)))
                  {
                    echo "<div class='tweet3'>";
                    echo "<p class='retweet_class'>$row[full_name] retweeted</p>";
                    echo "<a href='#'>";
                    if(file_exists("accounts/$row1[username]/profile_image.jpg"))
                      echo "<img class='following_profile_image3' src='accounts/$row1[username]/profile_image.jpg'/>"; 
                    else
                      echo "<img class='following_profile_image3' src='images/profile_image1.jpg'/>";
                    echo "</a>";
                    echo "<div class='following_tweet_contents3'>";
                    echo "<a href='#' class='link123'><span class='following_full_name3'>$row1[full_name]</span>";
                    echo "<span class='following_username3'> @$row1[username]</span>";
                    echo "<span> - $row[date] $row[time]</span></a>";
                    echo "<p  class='following_tweet3'>$row1[tweet]</p>";
                    echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/reply2.png'/><span> </span></a>";
                    echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/retweet1.png'/><span> $row1[retweet]</span></a>";
                    echo "<a href='#' class='following_rep_ret_fav_link3'><img src='images/favourite2.png'/><span> $row1[favourite]</span></a>";
                    echo "</div>";
                    echo "</div>";
                  }	
                }
                }
              }
            ?>
            
            
        </div>
	</div>