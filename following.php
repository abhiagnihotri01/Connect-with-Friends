<?php
  @session_start();
  
  $_SESSION['tweets_followers_following']="following.php";
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");
?>

<style type="text/css">
    
	.profile_photo_class1
    {
        background-color: white;
    	width:300px;
    	height:240px;
    	border:1px solid #66757f;
    	border-radius: 8px;
    	float:left;
    	margin-right: 10px;
        margin-bottom: 10px;
    }
    .profile_back_image_link1
    {
    	width:100%;
    	height:120px;
    	text-decoration: none;
    	display: inline-block;
        border-top-left-radius: 8px;
    	border-top-right-radius: 8px;
    }
    .img111
    {
    	width:100%;
    	height:100%;
        border-top-left-radius: 8px;
    	border-top-right-radius: 8px;
    }
    .profile_image_link1
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
    .img121
    {
    	width:100%;
    	height:100%;
        border-radius: 6px;
    }
    .follow_unfollow_link1
    {
    	margin: -40px 30px 0 180px;
    	text-decoration: none;
    	background-color: blue;
    	color: white;
    	padding: 5px 10px 5px 10px;
    	border:1px solid blue;
    	border-radius: 5px;
    	display: inherit;
    	text-align: center;
    }
    .full_name_link1
    {
    	margin-left: 25px;
    	margin-top: 15px;
    	font-weight: bold;
    	text-decoration: none;
    	color: black;
    	font-size: 20px;
    	display: inline-block;
    }
    .username_link1
    {
        margin-left: 25px;
    	margin-top: 5px;
    	text-decoration: none;
    	color: red;
    	font-size: 14px;
    	display: inline-block;
    }
    .clearfix
    {
    	clear:both;
    }
</style>

<script type="text/javascript">
function following_func1(obj)
{
	obj.style.background="red";
	obj.innerHTML="Unfollow";
}
function following_func2(obj)
{
	obj.style.background="blue";
	obj.innerHTML="Following";
}
function unfollow_java_func(obj)
{
    var s = obj.getAttribute("id");
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) 
          {
            //document.write(xmlhttp.responseText);
            //document.getElementById(s).setAttribute("href","profi.php");
          }
        }
        
        xmlhttp.open("GET","delete_followers_following_ajax.php?following="+s,false);
            
        xmlhttp.send();
}
</script>
<div class="followers_profile1">
	<?php
	function unfollow_func($s)
	{
		mysql_query("delete from $_SESSION[username]_followers where username='$s'");
		//return "followers.php";
	}

    $query = mysql_query("select * from $_SESSION[username]_following", $con);
    
    if($query && ($num=mysql_num_rows($query)) > 0)
    {
      while($row=mysql_fetch_array($query))
      {
        echo "<div class=profile_photo_class1>";
      
	    if(file_exists("accounts/$row[username]/profile_back_image.jpg"))
		  echo "<a href='#' class='profile_back_image_link1'><img src='accounts/$row[username]/profile_back_image.jpg' alt='could not display' class='img111'></a>";
	    else
		echo "<a href='#' class='profile_back_image_link1' style='background-color:red;'></a>";

	    if(file_exists("accounts/$row[username]/profile_image.jpg"))
		  echo "<a href='#' class='profile_image_link1'><img src='accounts/$row[username]/profile_image.jpg' alt='could not display' class='img121'></a>";
	    else
		  echo "<a href='#' class='profile_image_link1' style='background-color:blue;'></a>";
	  
	    echo "<a href='profile.php' id='$row[username]' class='follow_unfollow_link1' onmouseover='following_func1(this);' onmouseout='following_func2(this);' onclick='unfollow_java_func(this);'>Following</a>";

        echo "<a href='#' class='full_name_link1'>$row[full_name]</a><br>";
	    echo "<a href='#' class='username_link1'>@$row[username]</a>";
	    echo "<input type='submit' id='submit1' style='display:none;'>";

	    echo "</div>";
	  }
	}
	
	
	?>
</div>