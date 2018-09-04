<?php
  
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

?>

<style type="text/css">
	.account_and_language_setting
	{
		background-color: white;
		width:600px;
		height: auto;
		border:1px solid #66757f;
        border-radius: 8px;
	}
	.account_headers
	{
		width:100%;
		height: 70px;
		border-bottom:1px solid #eee;
	}
	.account_headers_heading
	{
		color: #66757f;
		margin-top: 8px;
		margin-left: 8px;
		font-weight: lighter;
	}
	.account_headers_paragraph
	{
		color: #8899a6;
		margin-top: 5px;
		margin-left: 8px;
		font-size: 14px;
	}
	.following_tweets
	{
		width:100%;
		height:auto;
		padding-bottom: 5px;
	}
	.tweet 
	{
		width:100%;
		padding-bottom: 10px;
		border-top: 1px solid #e1e8ed;
		/*padding:10px 0 0 10px;*/
	}
	.tweet:hover
	{
		background-color: #F7E5E5;
	}
	.following_profile_image 
	{
		width:50px;
		height:50px;
		border-radius: 6px;
		margin-left: 10px;
		margin-top: 10px;
		float:left;
	}
	.following_tweet_contents
	{
		margin-left: 70px;
		padding-top: 8px;
	}
	.link12
	{
		text-decoration: none;
		display: inline-block;
		color: #66757f;
		font-size: 14px;
	}
	.following_full_name
	{
		color: black;
		font-weight: bold;
		font-size: 17px;
	}
	.following_tweet
	{
		color: black;
		font-weight: lighter;
		font-size: 14px;

	}
	.following_rep_ret_fav_link
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
	.following_rep_ret_fav_link:hover
	{
		color: red;
	}
	.following_rep_ret_fav_link img
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

<script src="jquery-2.1.4.js"></script>  
<script type="text/javascript">
function open_others_profile(obj)
{
        var b=obj.nextSibling.childNodes[0].childNodes[0].innerHTML;
        var c=obj.nextSibling.childNodes[0].childNodes[1].innerHTML;

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) 
          {
            //alert("giuvi");
            //document.write(xmlhttp.responseText);
            //document.getElementById(s).setAttribute("href","profi.php");
          }
        }
        
        xmlhttp.open("GET","search_database_others_profile_ajax.php?others_full_name="+b+"&others_username="+c,false);
            
        xmlhttp.send();
}
</script>
<script>
    $(document).ready(function(){
    $(".retweet4").click(function(){
    	var s=$(this).attr("id");
    	//$("#link3").trigger("click");
    	

      $("#body_id5").css("position","fixed");
      $("#for_pop_up_menu").css("width","1600px");
      $("#for_pop_up_menu").css("height","1200px");
      $("#for_pop_up_menu").css("top","0");
      $("#for_pop_up_menu").css("left","0");
      $("#for_pop_up_menu").css("position","fixed");
      $("#for_pop_up_menu").css("background-color","black");
      $("#for_pop_up_menu").css("opacity","0.7");

     $("#write_tweet").load("retweet_ajax.php",{tweet_id:s,others_username:$("#"+s+"2").text(),others_full_name:$("#"+s+"1").text(),others_tweet:$("#"+s+"3").text()},function(){

    });
        

    });
    });  
    
</script>	
	<div class="account_and_language_setting">
		<div class="account_headers">
			<h2 class="account_headers_heading">Tweets</h2>
	        <p class="account_headers_paragraph">Tweets of following persons.</p>
	    </div>

	    <div class="following_tweets">

            <?php

              $query = mysql_query("select * from $_SESSION[username]_following");
              if(($num = mysql_num_rows($query)) > 0)
              {
                $s="";$i=1;
                while($row=mysql_fetch_array($query))
                {
              
                	if($i < $num)
              	        $s=$s."select * from $row[username]_tweets union ";
              	    else
              	        $s=$s."select * from $row[username]_tweets order by date desc,time desc";
              	    $i++;
                }
                 //echo $s;
                $query = mysql_query($s);
                if(($num = mysql_num_rows($query)) > 20)
                	$num = 20;
                
                while($row=mysql_fetch_array($query))
                {

                if($row['retweeted'] == "no")
                {
                  echo "<div class='tweet'>";
                  echo "<a href='others_profile.php' onclick='open_others_profile(this);'>";
                  if(file_exists("accounts/$row[username]/profile_image.jpg"))
				    echo "<img class='following_profile_image' src='accounts/$row[username]/profile_image.jpg'/>"; 
				  else
				    echo "<img class='following_profile_image' src='images/profile_image1.jpg'/>";				    
                  
                  echo "</a>";
                  echo "<div class='following_tweet_contents'>";
                  echo "<a href='#' class='link12'><span class='following_full_name' id='$row[tweet_id]1'>$row[full_name]</span>";
                  echo "<span id='$row[tweet_id]2' class='following_username'> @$row[username]</span>";
                  echo "<span> - $row[date] $row[time]</span></a>";
                  echo "<p  class='following_tweet' id='$row[tweet_id]3'>$row[tweet]</p>";
                  echo "<a href='#' class='following_rep_ret_fav_link reply4'><img src='images/reply2.png'/><span> </span></a>";
                  echo "<a href='#' class='following_rep_ret_fav_link retweet4' id='$row[tweet_id]'><img src='images/retweet1.png'/><span> $row[retweet]</span></a>";
                  echo "<a href='#' class='following_rep_ret_fav_link favourite4' id='favourite_id'><img src='images/favourite2.png'/><span> $row[favourite]</span></a>";
                  echo "</div>";
                  echo "</div>";
                }
                else
                {
                  $query1 = mysql_query("select * from $row[username]_tweets where tweet_id='$row[tweet_id]'");

                  if(($num1 = mysql_num_rows($query1)) > 0 && ($row1=mysql_fetch_array($query1)))
                  {
                    echo "<div class='tweet'>";
                    echo "<p class='retweet_class'>$row[full_name] retweeted</p>";
                    echo "<a href='others_profile.php' onclick='open_others_profile(this);'>";
                    if(file_exists("accounts/$row1[username]/profile_image.jpg"))
				      echo "<img class='following_profile_image' src='accounts/$row1[username]/profile_image.jpg'/>"; 
				    else
				      echo "<img class='following_profile_image' src='images/profile_image1.jpg'/>";				    
                  
                    echo "</a>";
                    echo "<div class='following_tweet_contents'>";
                    echo "<a href='#' class='link12'><span class='following_full_name' id='$row1[tweet_id]1'>$row1[full_name]</span>";
                    echo "<span id='$row1[tweet_id]2' class='following_username'> @$row1[username]</span>";
                    echo "<span> - $row[date] $row[time]</span></a>";
                    echo "<p  class='following_tweet' id='$row1[tweet_id]3'>$row1[tweet]</p>";
                    echo "<a href='#' class='following_rep_ret_fav_link reply4'><img src='images/reply2.png'/><span> </span></a>";
                    echo "<a href='#' class='following_rep_ret_fav_link retweet4' id='$row1[tweet_id]'><img src='images/retweet1.png'/><span> $row1[retweet]</span></a>";
                    echo "<a href='#' class='following_rep_ret_fav_link favourite4' id='favourite_id'><img src='images/favourite2.png'/><span> $row1[favourite]</span></a>";
                    echo "</div>";
                    echo "</div>";
                  }	
                }

                }
              }
            ?>
            
            
        </div>
	</div>