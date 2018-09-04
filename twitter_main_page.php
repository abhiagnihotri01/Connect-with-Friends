<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  session_start();

  if(!$_SESSION['logout'])
  {
    header("Location:login.php");
    exit();
  }

  $_SESSION['start1']=0;

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  $query=mysql_query("select * from $_SESSION[username]_tweets");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['tweets_num']=$num;
  else
    $_SESSION['tweets_num']=0;

  $query=mysql_query("select * from $_SESSION[username]_following");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['following_num']=$num;
  else
    $_SESSION['following_num']=0;

  $query=mysql_query("select * from $_SESSION[username]_followers");
  if(($num=mysql_num_rows($query)) > 0)
    $_SESSION['followers_num']=$num;
  else
    $_SESSION['followers_num']=0; 
?>

<html>
<head>
    <title>Account Settings</title>
<style type="text/css">
    *
    {
    	margin: 0;
    	padding: 0;
    	font-family: arial;
    }
    body
    {
        background-color: blue;
    }
    .position_fixed
    {
        width:100%;
        position: fixed;
        top:0;
    }
    .main_class
    {
        /*position: static;*/
        margin-top: 60px;
        margin-bottom: 30px;
    }
    .left_options
    {
    	width:300px;
    	float: left;
        
    	margin-left: 90px;
    }
    .profile_photo_class
    {
        background-color: white;
    	width:100%;
    	height:230px;
    	border:1px solid #eeeeee;
    	border-radius: 8px;
    }
    .profile_back_image_link
    {
    	width:100%;
    	height:120px;
    	text-decoration: none;
    	display: inline-block;
        border-top-left-radius: 8px;
    	border-top-right-radius: 8px;
    }
    .img11
    {
    	width:100%;
    	height:100%;
        border-top-left-radius: 8px;
    	border-top-right-radius: 8px;
    }
    .profile_image_link
    {
    	margin-left: 20px;
    	margin-top: -40px;
    	width:80px;
    	height:80px;
    	text-decoration: none;
    	display: inline-block;
    	border: 4px solid white;
        border-radius: 6px;
        
    }
    .img12
    {
    	width:100%;
    	height:100%;
        border-radius: 6px;
    }
    .full_name_link
    {
    	margin-left: 115px;
    	margin-top: -40px;
    	font-weight: bold;
    	text-decoration: none;
    	color: black;
    	font-size: 20px;
    	display: inherit;
    }
    .full_name_link:hover
    {
        text-decoration: underline;
    }
    .username_link
    {
        margin-left: 115px;
    	margin-top: 5px;
    	text-decoration: none;
    	color: #66757f;
    	font-size: 14px;
    	display: inherit;	
    }
    .username_link:hover
    {
        text-decoration: underline;
        color: red;
    }
    .account_language_setting
    {
        /*margin-top: 70px;*/
        margin-left: 402px;
    }
    .tw_fo_fo_class
    {
        margin-top: 10px;
    }
    .tweet_follower_following_link
    {
        width: 97px;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        color:#CD6E6E;
        
    }
    .tweet_follower_following_link:hover
    {
        color:red;
    }
    .tweet_class
    {
        font-size: 12px;
        display: block;
    }
    .number_class
    {
        line-height: 28px;
        color:red;
        font-size: 20px;
        display: block;

    }
    .clearfix
    {
        clear:both;
    }
@media screen and (max-width:1100px)
{
    body
    {
        width:1100px;
    }
    
}
@media screen and (max-width:950px)
{
    .position_fixed
    {
        width:950px;
    }
    
}

</style>
<script type="text/javascript">

    function menu_func(obj)
    {
        var s = obj.getAttribute("id");
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) 
          {
            //document.getElementById("tweet_id").setAttribute("href","profile.php");
          }
        }
        if(s == "tweet_id")
            xmlhttp.open("GET","tweets_followers_following_ajax.php?q=own_tweets.php",false);
        else if(s == "following_id")
            xmlhttp.open("GET","tweets_followers_following_ajax.php?q=following.php",false);
        else if(s == "followers_id")
            xmlhttp.open("GET","tweets_followers_following_ajax.php?q=followers.php",false);
        xmlhttp.send();
    }
</script>
</head>
<body id="body_id5">
    
    <div class="position_fixed">
	    <?php
	     require ("header.php");
	    ?>
    </div>

	<div class="main_class">
		<div class="left_options">
			<div class="profile_photo_class">
				<?php
				  if(file_exists("accounts/$_SESSION[username]/profile_back_image.jpg"))
				    echo "<a href='profile.php' class='profile_back_image_link'><img src='accounts/$_SESSION[username]/profile_back_image.jpg' alt='could not display' class='img11'></a>";
				  else
				  	echo "<a href='profile.php' class='profile_back_image_link' style='background-color:red;'></a>";

				  if(file_exists("accounts/$_SESSION[username]/profile_image.jpg"))
				    echo "<a href='profile.php' class='profile_image_link'><img src='accounts/$_SESSION[username]/profile_image.jpg' alt='could not display' class='img12'></a>";
				  else
				  	echo "<a href='profile.php' class='profile_image_link' style='background-color:blue;'></a>";
				?>

				<a href="profile.php" class="full_name_link"><?php echo "$_SESSION[full_name]"; ?></a>
				<a href="profile.php" class="username_link"><?php echo "@$_SESSION[username]"; ?></a>

            <div class="tw_fo_fo_class">
                <a href="profile.php" class="tweet_follower_following_link" id="tweet_id" onclick="menu_func(this);">
                    <span class="tweet_class">TWEETS</span>
                    <span class="number_class"><?php echo $_SESSION['tweets_num']; ?></span>
                </a>
                <a href="profile.php" class="tweet_follower_following_link" id="following_id" onclick="menu_func(this);">
                    <span class="tweet_class">FOLLOWING</span>
                    <span class="number_class"><?php echo $_SESSION['following_num']; ?></span>
                </a>
                <a href="profile.php" class="tweet_follower_following_link" id="followers_id" onclick="menu_func(this);">
                    <span class="tweet_class">FOLLOWERS</span>
                    <span class="number_class"><?php echo $_SESSION['followers_num']; ?></span>
                </a>
            </div>

			</div>

		</div>

		<div class="account_language_setting">
            <?php
                require("following_tweets.php");
                 
                $_SESSION['start1']++; 
            ?>
		</div>
    </div>

</body>
</html>