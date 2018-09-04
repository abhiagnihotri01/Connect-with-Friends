<?php
  $n=substr($_POST['others_username'],2);
?>

<style type="text/css">
	#tweet_window   
	{
		width: 600px;
		height: 200px;
		background-color: #eee;
		border: 1px solid #eee;
		border-radius: 6px;
		opacity: 0.99;		
		margin-left: auto;
		margin-right: auto;
		margin-top: 170px;
	}
	#tweet_header  
	{
		background-color: white;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		padding: 8px;
		text-align: center;
	}
	#tweet_heading   
	{
		color:#66757f;
		font-size: 18px;
	}
	#close_link   
	{
		text-decoration: none;
		color:red;
		float: right;
		font-size: 22px;
		margin-right: 10px;
	}
	#main_div
	{
		padding: 10px;
	}
	#add_photo
	{
		width:50px;
		height:50px;
		border-radius: 5px;
		float: left;
	}
	#fullname_username
	{
		/*float: left;*/
		margin-left: 60px;
	}
	#fullname
	{
		font-size: 18px;
		color:black;
		font-weight: bold;
	}
	#username
	{
		color: #66757f;
		font-weight: lighter;
		font-size: 14px;
	}
	#others_tweet
	{
		margin-top: 5px;
	}
	#retweet_button
	{
		text-decoration: none;
		background-color: red;
		color: white;
		font-size: 18px;
		padding: 10px 15px 10px 15px;
		border-radius: 4px;
		float: right;
		margin: 45px 15px 0 0;
	}
	#submit_image
	{
		display: none;
	}
	.clearfix
	{
		clear: both;
	}
</style>

<script src="jquery-2.1.4.js"></script>  
<script>
    $(document).ready(function(){
    $("#retweet_button").click(function(){
        $("#visually_hidden").load("retweet_save_database_ajax.php",{tweet_id:$("#hidden_tweet_id").val(),username:$("#username").text(),tweet:$("#others_tweet").text()},function()
        	{
        		$("#body_id5").css("position","");
                $("#for_pop_up_menu").css("width","");
                $("#for_pop_up_menu").css("height","");

                $("#write_tweet").empty();
        	});

    });

    $("#close_link").click(function()
    	{
    		$("#body_id5").css("position","");
            $("#for_pop_up_menu").css("width","");
            $("#for_pop_up_menu").css("height","");

            $("#write_tweet").empty();
    	});
});

</script>

	<div id="tweet_window">
		<div id="tweet_header">
		  <span id="tweet_heading">Retweet this to your followers</span>
		  <a href="#" id="close_link">&times;</a>
		</div>

        <span class="clearfix"></span>
         
      <div id="main_div">
      	<?php
      	  if(file_exists("accounts/$n/profile_image.jpg"))
            echo "<img id='add_photo' src='accounts/$n/profile_image.jpg'/>"; 
          else
            echo "<img id='add_photo' src='images/profile_image1.jpg'/>";
      	?>
		
        <input type="hidden" id="hidden_tweet_id" value="<?php echo $_POST['tweet_id']; ?>">

		<div id="fullname_username">
			<span id="fullname"><?php echo "$_POST[others_full_name]"; ?></span>
		    <span id="username"><?php echo "$_POST[others_username]"; ?></span><br>
			<p id="others_tweet"><?php echo "$_POST[others_tweet]"; ?></p>
		</div>
      </div>

      <div class="clearfix"></div>

		<a href="#" id="retweet_button">Retweet</a>

	  <form method="post" action="" enctype="multipart/form-data" id="submit_image">
	  	<input type="file" id="upload_image2">
	  	<input type="submit">
	  </form>
	</div>

	<div id="visually_hidden" style="display:none;">
	</div>