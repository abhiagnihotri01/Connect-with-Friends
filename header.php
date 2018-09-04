
	<style type="text/css">
	  #fixed_bar
	  {
	  	/*position: fixed;*/
	  	width:100%;
	  	height:50px;
	  	background-color: white;
	  } 
	  .left-margin
	  {
	  	margin-left: 6%;
	  }
	  .link1
	  {
	  	text-decoration: none;
	  	display: inline-block;
	  	text-align: center;
	  	padding-left: 10px;
	  	padding-right: 10px;
	  } 
      .img1
      {
      	line-height: 50px;
      	vertical-align: middle;
      }
      .span1
      {
      	line-height: 50px;
      }
      .right-margin
      {
      	float: right;
      	margin-right: 6%;
      }
      #link3
      {
      	text-decoration: none;
      	background-color: red;
      	color: white;
      	border-radius: 5px;
      	line-height: 50px;
      	padding: 10px;

      }
      #link3:hover
      {
      	background-color: #3b88c3;
      }
      #textbox1
      {
      	outline: none;
        background-color: white;
      	border: 1px solid #a1e8ed;
      	border-radius: 20px;
      	padding:8px 40px 8px 15px;
      }
      .search_link
      {
      	
      	margin-left: -35px;
      }
      #search12
      {
        float: right;
        margin-right: calc(6% + 50px);
      }
      #settings_div
      {
        float: right;
        margin-right: calc(6% + 25px);
      }
      #settings
      {
        line-height: 50px;
        vertical-align: middle;
        width: 40px;
        height: 40px;
        border-radius: 4px;
      }
      .clearfix
      {
      	clear:both;
      }
      
	</style>

<script src="jquery-2.1.4.js"></script>  
<script>
    $(document).ready(function(){
    $("#textbox1").keyup(function(){
        $("#search12").load("search_database_ajax.php",{search:$("#textbox1").val()});

    });

    $("#body_id5").click(function(){
      $("#search12").empty();
      $("#settings_div").empty();
    });

    $("#for_pop_up_menu").click(function(){
      $("#body_id5").css("position","");
      $("#for_pop_up_menu").css("width","");
      $("#for_pop_up_menu").css("height","");
      $("#write_tweet").empty();
    });

    $("#settings").click(function(){
      $("#settings_div").load("settings_drop_down_menu_ajax.php");
    });    


    $("#link3").click(function(){
      
      $("#body_id5").css("position","fixed");
      $("#for_pop_up_menu").css("width","1600px");
      $("#for_pop_up_menu").css("height","1200px");
      $("#for_pop_up_menu").css("top","0");
      $("#for_pop_up_menu").css("left","0");
      $("#for_pop_up_menu").css("position","fixed");
      $("#for_pop_up_menu").css("background-color","black");
      $("#for_pop_up_menu").css("opacity","0.7");

      $("#write_tweet").load("send_tweet_ajax.php",function(){

    });
    });
});

</script>

	<div id="fixed_bar">
	  <span class="left-margin">
		<a class="link1" href="twitter_main_page.php">
			<img class="img1" src="images/home1.jpg" width="40px" height="40px">
			<span class="span1">Home</span>
		</a>

		<a class="link1" href="#">
			<img class="img1" src="images/notification.jpg" width="40px" height="40px">
			<span class="span1">Notifications</span>
		</a>

		<a class="link1" href="#">
			<img class="img1" src="images/message.jpg" width="40px" height="40px">
			<span class="span1">Messages</span>
		</a>
	  </span>

      <span class="clearfix"></span>

	  <span class="right-margin">
		 <span class="search">
		    <input id="textbox1" type="text" placeholder="Search Twitter" size="30">
		    <a class="search_link" href="#"><img class="img1" src="images/search1.png" width="20px" height="20px"></a>
		 </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		 <a class="link1" href="#" style="padding:0;">
      <?php
        
        if(file_exists("accounts/$_SESSION[username]/profile_image.jpg"))
          echo "<img id='settings' src='accounts/$_SESSION[username]/profile_image.jpg'/>"; 
        else
          echo "<img id='settings' src='images/profile_image1.jpg'/>";
      ?>
		 </a>&nbsp;&nbsp;&nbsp;

		 <a id="link3" href="#">Tweet</a>
   
	  </span>
	</div>
  
  <span id="search12"></span>

  <span class="clearfix"></span>

  <div id="settings_div"></div>

  <span id="for_pop_up_menu"></span>
<span class="clearfix"></span>
    <span id="write_tweet"></span>