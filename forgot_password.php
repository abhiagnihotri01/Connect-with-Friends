<?php
  echo "<link rel='icon' href='images/icon.png'/>";

  $err = array();

  $c = 0;
  if($_POST)
  {
    $ques = $_POST['question'];

    $con = mysql_connect("localhost","root","abhinav") or die();
    mysql_select_db("database1");
    
    if(empty($_POST['username']))
    {
      $err['username'] = "Please enter username";
    }
  	else if(!empty($_POST['username']) && empty($_POST['question']) && empty($_POST['answer']))
  	{
        $query = mysql_query("select question from login10 where username='$_POST[username]'", $con);
  	    
  	    if($query && $num = mysql_num_rows($query))
  	    {
          $row = mysql_fetch_array($query); 
          $_POST['question'] = $row[0];
          
  	    	$c++;
  	    }
  	    else
  	    {  	
  	    	$err['username']="Invalid username";
  	    }
  	}
    
  	else
  	{
      if(!empty($_POST['answer']))
      {
        $query = mysql_query("select password from login10 where username='$_POST[username]' and answer='$_POST[answer]'", $con);
        if($query && $num = mysql_num_rows($query))
        {
          $row1 = mysql_fetch_array($query);
          $pass = $row1[0];

          $c = $c + 2;
        }
        else
        {
          $err['answer'] = "Please enter correct answer";
          $c++;
        }
        
      }
      else
      {
        $err['answer'] = "Please enter correct answer";
        $c++;
      }
  	}
  }
?>

<html>
<head>
<title>Forgot password</title>
<style type="text/css">
  *
  {
    margin:0;
    padding:0;
  }
  body
  {
    background-color: blue;
    color: red;
  }
  #login_id
  {
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
    width: 530px;
    height: auto;
    border-radius: 4px;
    margin-top: 50px;
    padding-top: 15px;
    padding-left: 70px;
    padding-bottom: 20px;
  }
  h1
  {
    color: black;
    margin-bottom: 30px;
  }
  #p1
  {
    margin-bottom: 10px;
    font-size: 18px;
  }
  input
  {
    width: 280px;
    font-size: 14px;
    padding:7px 3px 7px 3px;
    border:1px solid #31e8ed;
    border-radius: 3px;
    margin-bottom: 20px;
    color: black;
  }
  
  #submit_button
  {
    width:280px;
    background-color: #55acee;
    color: white;
    font-weight: bold;
    font-size: 18px;
    padding: 6px 0 6px 0;
    border: 1px solid #3b88c3;
    margin-top: 15px;
  }

@media screen and (max-width:750px)
{
  body
  {
    width:750px;
  }
}  
</style>
</head>
<body>
  <div id="login_id">
    <h1>Recover Password</h1>

		<form method="post" action="">
			<input id="txt3" type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
			<?php
        if(isset($_POST['username']) && !empty($err['username']))
        {
			    echo "&nbsp;&nbsp;&nbsp;".$err['username'];
			  }
			?>

			<input type="text" name="question" id="txt1" readonly value="<?php if(isset($_POST['question'])) echo $_POST['question']; ?>">

			<input type="text" name="answer" id="txt2" placeholder="Answer" value="<?php if(isset($_POST['answer'])) echo $_POST['answer']; ?>">
			<?php
        if(isset($_POST['answer']) && !empty($err['answer']))
        {
			    echo "&nbsp;&nbsp;&nbsp;".$err['answer'];
			  }
			?>

			<p id="p1"></p>

			<?php
        if($c == 0)
        {
          echo "<script type='text/javascript'>
                document.getElementById('txt1').style.display='none';
                document.getElementById('txt2').style.display='none';
                document.getElementById('p1').style.display='none';
                </script>";
        }
        if($c == 1)
        {
       	  echo "<script type='text/javascript'>
                
                document.getElementById('txt1').value=$_POST[question];
                document.getElementById('txt3').readonly;
       	        </script>";
  	    	
        }
        else if($c == 2)
        {
          echo "<script type='text/javascript'>
                document.getElementById('p1').innerHTML='Password: $pass';
       	        </script>";
        }
      ?>

			<input type="submit" value="search" id="submit_button">
		</form>
	</div>
</body>
</html>