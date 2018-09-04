<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  session_start();

  $c = 0;
  if($_POST)
  {
  	//echo "jbilhblhoig<br>";
  	if(!empty($_POST['username']) && !empty($_POST['password']))
  	{
  		//echo "inipobgiuvflyu";
  		$con = mysql_connect("localhost","root","abhinav") or die();
        mysql_select_db("database1");
        $query = mysql_query("select * from login10 where username='$_POST[username]' and password='$_POST[password]'", $con);
  	    
  	    if(($num = mysql_num_rows($query)) == 1)
  	    {
          while($row=mysql_fetch_array($query))
          {
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['username'] = $_POST['username'];
          }

          $_SESSION['logout']="abc";   //session for logout

          header("Location:twitter_main_page.php");

  	    }
  	    else
  	    {  	
  	    	$c++;
  	    }
  	}
  	else
  	{
  		$c++;
  	}
  }
?>

<html>
<head>
	<title>Login twitter</title>
<style type="text/css">
  *
  {
    margin:0;
    padding:0;
  }
  #slider_div
  {
    width:100%;
    height:100%;
    overflow: hidden;
    background-color: black;
    position: fixed;
  }
  #slide_image
  {
    width: 100%;
    height:100%;
  }
  #login_id
  {
    position: absolute;
    background-color: #fff;
    width: 340px;
    /*height: 230px;*/
    height: auto;
    border-radius: 4px;
    /*margin-left: 60%;*/
    right:15%;
    margin-top: 200px;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 25px;
    box-shadow: 0 0 40px 1px black;
  }
  #p1
  {
    margin-bottom: 10px;
    color: red;
  }
  input
  {
    width:280px;
    font-size: 14px;
    padding:6px 3px 6px 3px;
    border:1px solid #31e8ed;
    border-radius: 3px;
    /*outline: none;*/
  }
  .submit_button
  {
    background-color: #55acee;
    color: white;
    font-weight: bold;
    font-size: 16px;
    padding: 6px 15px 6px 15px;
    border: 1px solid #3b88c3;
    margin-top: 15px;
  }
  .link1
  {
    text-decoration: none;
  }

@media screen and (max-width:500px)
{
  body
  {
    width:500px;
  }
  #login_id
  {
    left: 15%;
    right:15%;
  }
}

</style>

<script src="jquery-2.1.4.js"></script>  
<script>
    var c=0;
    $(document).ready(function(){
      setInterval(function()
        {
          $("#slide_image"+(c%7)).fadeOut(500,function()
            {
              $("#slide_image"+((++c)%7)).fadeIn(500);
            }); 
        },5000);

});

</script>
</head>
<body>
  <div id="slider_div">
      <img src="images/six.jpg" class="slide_image" id="slide_image0"/>
      <img src="images/seven.jpg" class="slide_image" id="slide_image1" style="display:none;"/>
      <img src="images/eight.jpg" class="slide_image" id="slide_image2" style="display:none;"/>
      <img src="images/nine.jpg" class="slide_image" id="slide_image3" style="display:none;"/>
      <img src="images/ten.jpg" class="slide_image" id="slide_image4" style="display:none;"/>
      <img src="images/eleven.jpg" class="slide_image" id="slide_image5" style="display:none;"/>
      <img src="images/twelve.jpg" class="slide_image" id="slide_image6" style="display:none;"/>
  </div>

<div id="login_id">
 
	<p id="p1" style="display:none;">The username and password do not match.</p>

    <?php
       if($c == 1)
       {
       	    echo "<script type='text/javascript'>document.getElementById('p1').style.display='block';</script>";
  	    	
       }
    ?>

	<form method="post" action="">
	  <input type="text" name="username" placeholder="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"><br><br>

	  <input type="password" name="password" placeholder="password" value=""><br><br>

	  <input type="submit" class="submit_button" value="Log in"><br><br>
  </form>

    <a href="forgot_password.php" class="link1" id="forgot_id">Forgot password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    New user? <a href="signup.php" class="link1" id="signup_id">Sign up now</a>
</div>
</body>
</html>