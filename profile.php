<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  error_reporting(0);

  session_start();
  
  if(!$_SESSION['logout'])
  {
    header("Location:login.php");
    exit();
  }

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");
  $_SESSION['start1'] = 0;

  if($_FILES && $_FILES['img12']['name'] != "")
  {
    if($_FILES['img12']['type'] == "image/jpeg" || $_FILES['img12']['type'] == "image/jpg")
    {
        //header("Location:login.php");
        /*$a=strrpos($_FILES['img12']['name'],".");
        $b=substr($_FILES['img12']['name'],$a+1);
        $b="accounts/$_SESSION[username]/profile_back_image.".$b;*/
        $b="accounts/$_SESSION[username]/profile_back_image.jpg";

        unlink($b);

        move_uploaded_file($_FILES['img12']['tmp_name'],$b);

        mysql_query("update login10 set profile_back_image='$b' where username='$_SESSION[username]'");
    }
  }
  else if($_FILES && $_FILES['img121']['name'] != "")
  {
    if($_FILES['img121']['type'] == "image/jpeg" || $_FILES['img121']['type'] == "image/jpg")
    {
        //header("Location:login.php");
        /*$a=strrpos($_FILES['img12']['name'],".");
        $b=substr($_FILES['img12']['name'],$a+1);
        $b="accounts/$_SESSION[username]/profile_back_image.".$b;*/
        $b="accounts/$_SESSION[username]/profile_image.jpg";

        unlink($b);

        move_uploaded_file($_FILES['img121']['tmp_name'],$b);

        mysql_query("insert into login10(profile_back_image) values('$b') where username='$_SESSION[username]'");
        
    }
  }
  /*else
  {
    $b=mysql_query("select profile_back_image,profile_image from login10 where username='$_SESSION[username]'");
  }*/
?>

<html>
<head>
<title>Profile</title>
<style type="text/css">
    *
    {
    	margin: 0;
    	padding: 0;
    	font-family: arial;
    }
    body
    {
        /*background-color: blue;*/
    }
    .position_fixed
    {
        width:100%;
        position: fixed;
        top:0;
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
    	width:200px;
    	height:200px;
    	text-decoration: none;
    	display: inline-block;
    	border: 5px solid white;
        border-radius: 10px;  
    }
    .img12
    {
    	width:100%;
    	height:100%;
        border-radius: 10px;
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
        /*float: right;*/
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
    .clearfix
    {
    	clear:both;
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
        $("#account_id").load("own_tweets.php");
    });

    $("#following_id").click(function(){
        $("#account_id").load("following.php");
    });

    $("#followers_id").click(function(){
        $("#account_id").load("followers.php");
    });

    $("#back_image").click(function(){
        $("#file_browser").trigger("click");
        //$("#submit_file").trigger("click");
    });

    $("#file_browser").change(function(){
        //$("#file_browser").trigger("click");
        $("#submit_file").trigger("click");
    });

    $("#profile_image").click(function(){
        $("#file_browser1").trigger("click");
        //$("#submit_file").trigger("click");
    });

    $("#file_browser1").change(function(){
        //$("#file_browser").trigger("click");
        $("#submit_file1").trigger("click");
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
				if(file_exists("accounts/$_SESSION[username]/profile_back_image.jpg"))
                    echo "<a href='#' class='profile_back_image_link' id='back_image'><img src='accounts/$_SESSION[username]/profile_back_image.jpg' alt='jbb' class='img11'></a>";
                else
                    echo "<a href='#' class='profile_back_image_link' id='back_image' style='background-color:red;'></a>";

                echo "<div class='menu1'>
                      <a href='#' class='menu_link' id='tweet_id' style='margin-left:420px;'>
                        <span class='menu_span1'>TWEETS</span>
                        <span class='menu_span2'>$_SESSION[tweets_num]</span>
                      </a>
                      <a href='#' class='menu_link' id='following_id'>
                        <span class='menu_span1'>FOLLOWING</span>
                        <span class='menu_span2'>$_SESSION[following_num]</span>
                      </a>
                      <a href='#' class='menu_link' id='followers_id'>
                        <span class='menu_span1'>FOLLOWERS</span>
                        <span class='menu_span2'>$_SESSION[followers_num]</span>
                      </a>
                      <a href='#' class='menu_link'>
                        <span class='menu_span1'>FAVOURITES</span>
                        <span class='menu_span2'>0</span>
                      </a>

                      
                      </div>";

                //echo "<button id='button1'>Edit Profile</button>";

				if(file_exists("accounts/$_SESSION[username]/profile_image.jpg"))
				    echo "<a href='#' class='profile_image_link' id='profile_image'><img src='accounts/$_SESSION[username]/profile_image.jpg' class='img12'></a>";
				else
				  	echo "<a href='#' class='profile_image_link' id='profile_image' style='background-color:blue;'></a>";
			?>

            <div class="clearfix"></div>

			<p><a href="#" class="full_name_link"><?php echo "$_SESSION[full_name]"; ?></a></p>
			<a href="#" class="username_link"><?php echo "@$_SESSION[username]"; ?></a>


		</div>

		<div class="account_language_setting" id="account_id">
            <?php
              if(isset($_SESSION['tweets_followers_following']) && $_SESSION['tweets_followers_following'] != "")
                require($_SESSION['tweets_followers_following']);
              else
                require("own_tweets.php");
                //require("followers.php");
            ?>
		</div>

        <form method="post" action="" enctype="multipart/form-data" style="display:none;">
            <input type="file" id="file_browser" name="img12">
            <input type="submit" id="submit_file">
        </form>

        <form method="post" action="" enctype="multipart/form-data" style="display:none;">
            <input type="file" id="file_browser1" name="img121">
            <input type="submit" id="submit_file1">
        </form>
</body>
</html>