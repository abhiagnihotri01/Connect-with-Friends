
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
		text-align: center;
	}
	#tweet_header
	{
		background-color: white;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		padding: 8px;
	}
	#tweet_heading
	{
		color:#66757f;
		font-size: 18px;
		text-align: center;
	}
	#close_link
	{
		text-decoration: none;
		color:red;
		float: right;
		font-size: 22px;
		margin-right: 10px;
	}
	#tweet_textarea
	{
		width:580px;
		height:95px;
		margin-top: 10px;
		font-size: 16px;
		border-radius: 6px;
	}
	#add_photo_link
	{
		text-decoration: none;
		color: red;
		float: left;
		/*margin-left: 10px;*/
		font-size: 18px;
		padding: 14px 0 14px 14px;
	}
	#tweet_button2
	{
		text-decoration: none;
		background-color: red;
		color: white;
		font-size: 18px;
		padding: 10px 15px 10px 15px;
		border-radius: 4px;
		float: right;
		margin: 10px 10px 0 0;
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
    $("#tweet_button2").click(function(){
        $("#visually_hidden").load("save_tweet_database_ajax.php",{tweet:$("#tweet_textarea").val()},function()
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
		  <span id="tweet_heading">Compose new Tweet</span>
		  <a href="#" id="close_link">&times;</a>
		</div>

        <span class="clearfix"></span>
         
		<textarea id="tweet_textarea" maxlength="140" noresize></textarea>
		<a href="#" id="add_photo_link">Add photo</a>
		<a href="#" id="tweet_button2">Tweet</a>

	  <form method="post" action="" enctype="multipart/form-data" id="submit_image">
	  	<input type="file" id="upload_image2">
	  	<input type="submit">
	  </form>
	</div>

	<div id="visually_hidden" style="display:none;"></div>