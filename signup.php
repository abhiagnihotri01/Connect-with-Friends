<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  session_start();

  $_SESSION['logout']="abc";  //session for logout

  $err = array();
  $c = 0;
  if($_POST)
  {
  	$con = mysql_connect("localhost","root","abhinav") or die();
    mysql_select_db("database1");

  	if(empty($_POST['full_name']))
  	{
  		$err['full_name'] = "Please enter name";
  	}

  	if(empty($_POST['username']))
  	{
  		$err['username'] = "Please enter username";
  	}
  	else
  	{
  		$query = mysql_query("select * from login10 where username='$_POST[username]'", $con);

  		if(($num = mysql_num_rows($query)) > 0)
  		{
  			$err['username'] = "This username has already been taken";
  		}
  	}

  	if(empty($_POST['password']))
  	{
  		$err['password'] = "Please enter password";
  	}
  	else if(strlen($_POST['password']) < 6)
  	{
  	    $err['password'] = "Please enter password of atleast 6 characters";
  	}

  	if(empty($_POST['answer']))
  	{
  		$err['answer'] = "Please enter answer";
  	}

  	if(count($err) == 0)
  	{
  		//$con = mysql_connect("localhost","root","abhinav") or die();
        //mysql_select_db("database1");
        $query = mysql_query("insert into login10(full_name,username,question,answer,password) values('$_POST[full_name]','$_POST[username]','$_POST[question]','$_POST[answer]','$_POST[password]')", $con);
  	    
  	    if($query)
  	    {
          $_SESSION['full_name'] = $_POST['full_name'];
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['question'] = $_POST['question'];
          $_SESSION['answer'] = $_POST['answer'];
          mkdir("accounts/$_POST[username]");

          mysql_query("create table $_POST[username]_tweets(tweet_id varchar(100) primary key,username varchar(50),
            full_name varchar(50),time time,date date,tweet varchar(200),
            image varchar(50),retweet int,favourite int,retweeted varchar(5) default 'no')",$con);

          mysql_query("create table $_POST[username]_following(username varchar(50),full_name varchar(50),image varchar(100))",$con);

          mysql_query("create table $_POST[username]_followers(username varchar(50),full_name varchar(50),image varchar(100))",$con);

          $_SESSION['logout']="abc";   //session for logout

          header("Location:twitter_main_page.php");
  	    }
  	    else
  	    {  	
  	    	header("Location:signup.php");
  	    }
  	}
  	
  }
?>

<html>
<head>
<title>Sign up for twitter</title>
<style type="text/css">
  *
  {
    margin:0;
    padding:0;
  }
  body
  {
    background-color: blue;
  }
  #login_id
  {
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
    width: 700px;
    height: 500px;
    border-radius: 4px;
    margin-top: 50px;
    padding-top: 15px;
    padding-left: 70px;
  }
  h1
  {
    margin-bottom: 30px;
  }
  /*#p1
  {
    margin-bottom: 10px;
    color: red;
  }*/
  input
  {
    width: 340px;
    font-size: 14px;
    padding:7px 3px 7px 3px;
    border:1px solid #31e8ed;
    border-radius: 3px;
    margin-bottom: 10px;
  }
  select
  {
    width:340px;
    padding:6px 3px 6px 3px;
    font-size: 15px;
    margin-bottom: 10px;
  }
  #submit_button
  {
    width:340px;
    background-color: #55acee;
    color: white;
    font-weight: bold;
    font-size: 18px;
    padding: 6px 0 6px 0;
    border: 1px solid #3b88c3;
    margin-top: 15px;
  }
@media screen and (max-width:800px)
{
  body
  {
    width:800px;
  }
}  
</style>

</head>
<body>
  <div id="login_id">
    <h1>Join to connect with friends</h1>

		<form method="post" action="signup.php">
			<input type="text" name="full_name" placeholder="Full name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name']; ?>">
			<?php
			    if(isset($_POST['full_name']) && !empty($err['full_name']))
			    {
			       echo "&nbsp;&nbsp;&nbsp;".$err['full_name'];
			    }
			?><br><br>
            
      <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
      <?php
          if(isset($_POST['username']) && !empty($err['username']))
          {
			       echo "&nbsp;&nbsp;&nbsp;".$err['username'];
			    }
			?><br><br>

      <input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
      <?php
          if(isset($_POST['password']) && !empty($err['password']))
          {
			       echo "&nbsp;&nbsp;&nbsp;".$err['password'];
			    }
			?><br><br>

      <select name="question">
          <option>What is my favourite color?</option>
          <option>What is my first school name?</option>
          <option>What is my vehicle number?</option>
          <option>What is my pet name?</option>
          <option>What is my favourite movie?</option>
      </select><br><br>

      <input type="text" name="answer" placeholder="Answer" value="<?php if(isset($_POST['answer'])) echo $_POST['answer']; ?>">
      <?php
          if(isset($_POST['answer']) && !empty($err['answer']))
          {
			       echo "&nbsp;&nbsp;&nbsp;".$err['answer'];
			    }
			?><br><br>

      <input type="submit" value="Sign up" id="submit_button">
		</form>
  </div>
</body>
</html>