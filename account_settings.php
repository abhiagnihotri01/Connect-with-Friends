<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  session_start();
  
  if(!$_SESSION['logout'])
  {
    header("Location:login.php");
    exit();
  }
  /*if($_FILES)
  {
    header("Location:header.php");
    if($_FILES['profile_image']['error'] > 0 && $_FILES['profile_image']['type'] == "image/jpeg")
    {
        move_uploaded_file($_FILES['profile_image']['tmp_name'], "accounts/$_SESSION[username]/profile_back_image.jpg");
    }
  }*/
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
        /*margin-top: 60px;*/
    	width:300px;
    	float: left;
        
    	margin-left: 90px;
    }
    .profile_photo_class
    {
        background-color: white;
    	width:100%;
    	height:200px;
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
    	color: red;
    	font-size: 14px;
    	display: inherit;	
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
        margin-left: 405px;
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
    function image_upload()
    {
        document.write("<form method='post' action='account_settings.php' style='display:none;' enctype='multipart/form-data'><input id='imageid1' type='file' name='profile_image' onchange='upload_image();'><input type='submit' id='image_submit'></form>");

        document.getElementById("imageid1").click();

        /*document.getElementById("image_submit").click();*/
    }
    function upload_image()
    {
        document.getElementById("image_submit").click();

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

			</div>

			<div class="options">
				<!--<button class="button1" onclick="func_account();"><a href="login.php" class="options_link">Account</a></button>
				<button class="button1" onclick="func_password();"><a href="" class="options_link">Password</a></button>
				<button class="button1" onclick="func_account();"><a href="" class="options_link" style="border-bottom:none;">Privacy Policy</a></button>-->

                <a href="account_settings.php" class="options_link">Account</a>
                <a href="password_settings.php" class="options_link">Password</a>
                <a href="#" class="options_link" style="border-bottom:none;">Privacy Policy</a>
			</div>
		</div>

		<div class="account_language_setting">
            <?php
                require("account_and_language_setting.php");
            ?>
		</div>
    </div>
	
</body>
</html>