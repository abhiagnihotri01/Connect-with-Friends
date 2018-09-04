<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  session_start();

  if(!$_SESSION['logout'])
  {
    header("Location:login.php");
    exit();
  }
  else if($_SESSION['others_username'] == $_SESSION['username'])
  {
    header("Location:profile.php");
    exit();
  }
  
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");
  $_SESSION['others_start1'] = 0;

  $query=mysql_query("select * from $_SESSION[username]_following where username='$_SESSION[others_username]'");

  if($query && ($num=mysql_num_rows($query)) > 0)
    $_SESSION['others_following']="Following";
  else
    $_SESSION['others_following']="Follow";
  
?>

<html>
<head>
<title>Others Profile</title>
<style type="text/css">
    *
    {
    	margin: 0;
    	padding: 0;
    	font-family: arial;
    }
    body
    {
        /*background-color: white;*/
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
        /*margin-top: 60px;*/
    	width:300px;
    	float: left;
        
    	margin-left: 90px;
    }
    .profile_photo_class
    {
        background-color: white;
    	width:100%;
    	height:500px;
        margin-top: 50px;
        top: 50px;
    	/*border:1px solid #eeeeee;
    	border-radius: 8px;*/
    }
    .profile_back_image_link
    {
    	width:100%;
    	height:320px;
    	text-decoration: none;
    	display: block;
        /*border-top-left-radius: 8px;
    	border-top-right-radius: 8px;*/
    }
    .img11
    {
    	width:100%;
    	height:100%;  
    }
    .profile_image_link
    {
    	margin-left: 90px;
    	margin-top: -160px;
    	width:210px;
    	height:210px;
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
    	margin-left: 90px;
    	margin-top: 8px;
    	font-weight: bold;
    	text-decoration: none;
    	color: black;
    	font-size: 26px;
    	display: inline-block;
    }
    .username_link
    {
        margin-left: 90px;
    	text-decoration: none;
    	color: red;
    	font-size: 18px;
    	display: inline-block;	
    }
    .options
    {
        background-color: white;
    	width:100%;
    	height:105px;
    	margin-top: 10px;
    	border:1px solid #eeeeee;
    	border-radius: 8px;
    }
    .options_link
    {
    	text-decoration: none;
    	display: block;
    	color: red;
    	line-height: 35px;
    	font-size: 18px;
    	text-align: center;
    	border-bottom: 1px solid #000;
    }
    .account_language_setting
    {
        /*margin-top: 70px;*/
        
        /*width:1000px;*/
        margin-left: 340px;
        margin-top: -90px;
        margin-bottom: 40px;
    }
    .menu1
    {
        width:100%;
        height: 60px;
        background-color: #eee;
    }
    .menu_link
    {
        text-decoration: none;
        color: #66757f;
        text-align: center;
        vertical-align: middle;
        display: inline-block;
        padding: 10px 17px 10px 17px;
    }
    .menu_link:hover
    {
        color:red;
    }
    .menu_span1
    {
        /*color: #66757f;*/
        font-size: 14px;
        display: block;
    }
    .menu_span2
    {
        color: red;
        font-size: 20px;
        display: block;
    }
    #button1
    {
        cursor: pointer;
        border:1px solid black;
        border-radius: 4px;
        padding: 10px;
        color: #66757f;
        font-weight: bold;
        font-size: 16px;
        float: right;
        margin-right: 6%;
        margin-top: 10px;
    }
    .clearfix
    {
    	clear:both;
    }
@media screen and (max-width:1100px)
{
    #button1
    {
      margin-right: 3%;
    }
}    
@media screen and (max-width:1050px)
{
    body
    {
        width:1050px;
    }
    .profile_back_image_link
    {
        width: 1050px;
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

<script src="jquery-2.1.4.js"></script>

<script>
$(document).ready(function(){
    $("#tweet_id").click(function(){
        $("#account_id").load("others_own_tweets.php");
    });

    $("#following_id").click(function(){
        $("#account_id").load("others_following.php");
    });

    $("#followers_id").click(function(){
        $("#account_id").load("others_followers.php");
    });

    $("#button1").click(function(){
        if($("#button1").text() == "Follow")
        {
            $("#button1").load("others_profile_clicked_on_follow_ajax.php");
        }
    });

});
</script>

</head>
<body id="body_id5">
    <div class="position_fixed">
	    <?php
	     require ("header.php");
	    ?>
    </div>

		<div class="profile_photo_class">
			<?php
				if(file_exists("accounts/$_SESSION[others_username]/profile_back_image.jpg"))
				    echo "<a href='#' class='profile_back_image_link' id='back_image'><img src='accounts/$_SESSION[others_username]/profile_back_image.jpg' alt='jbb' class='img11'></a>";
				else
				  	echo "<a href='#' class='profile_back_image_link' id='back_image' style='background-color:red;'></a>";

                echo "<div class='menu1'>
                      <a href='#' class='menu_link' id='tweet_id' style='margin-left:420px;'>
                        <span class='menu_span1'>TWEETS</span>
                        <span class='menu_span2'>$_SESSION[others_tweets_num]</span>
                      </a>
                      <a href='#' class='menu_link' id='following_id'>
                        <span class='menu_span1'>FOLLOWING</span>
                        <span class='menu_span2'>$_SESSION[others_following_num]</span>
                      </a>
                      <a href='#' class='menu_link' id='followers_id'>
                        <span class='menu_span1'>FOLLOWERS</span>
                        <span class='menu_span2'>$_SESSION[others_followers_num]</span>
                      </a>
                      <a href='#' class='menu_link'>
                        <span class='menu_span1'>FAVOURITES</span>
                        <span class='menu_span2'>0</span>
                      </a>

                      <button id='button1'>$_SESSION[others_following]</button>
                      </div>";

                //echo "<button id='button1'>Edit Profile</button>";

				if(file_exists("accounts/$_SESSION[others_username]/profile_image.jpg"))
				    echo "<a href='#' class='profile_image_link' id='profile_image'><img src='accounts/$_SESSION[others_username]/profile_image.jpg' alt='could not display' class='img12'></a>";
				else
				  	echo "<a href='#' class='profile_image_link' id='profile_image' style='background-color:blue;'></a>";
			?>

            <div class="clearfix"></div>

			<p><a href="#" class="full_name_link"><?php echo "$_SESSION[others_full_name]"; ?></a></p>
			<a href="#" class="username_link"><?php echo "@$_SESSION[others_username]"; ?></a>


		</div>

		<div class="account_language_setting" id="account_id">
            <?php
              
                require("others_own_tweets.php");
                //require("followers.php");
            ?>
		</div>
</body>
</html>