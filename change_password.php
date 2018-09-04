<?php
  $err = array();

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  if($_POST)
  {

    if(!empty($_POST['password']))
    {

        if(!empty($_POST['new_password']) && strlen($_POST['new_password']) >= 6)
        {
            if(!empty($_POST['verify_password']))
            {
                if($_POST['new_password'] == $_POST['verify_password'])
                {
                    $query=mysql_query("select * from login10 where username='$_SESSION[username]' and password='$_POST[password]'"); 
    
                    if(($num=mysql_num_rows($query)) == 1)
                    {  
                        mysql_query("update login10 set password='$_POST[new_password]' where username='$_SESSION[username]'");
                    }

                    $congrats = "Congrats. Password successfully changed";

                }
                else
                {
                    $err['match_password'] = 'Password do not match';
                    
                }
            }
            else
            {
                $err['verify_password'] = 'Enter confirm password';
                
            }
        }
        else
        {
           $err['new_password'] = 'Enter password of atleast 6 characters';
                  
        }
    }
    else
    {
      //header("Location:login.php");
      $err['password'] = "invalid password"; 
    }
  }
?>

<html>
<head>
	<title>Account and language settings</title>
<style type="text/css">
	.change_password_setting
	{
		background-color: white;
		width:600px;
		height: 500px;
		border:1px solid #eee;
        border-radius: 8px;
		/*margin: 20px 0 0 40px;*/
	}
	.password_headers
	{
		width:100%;
		height: 70px;
		border-bottom:1px solid #eee;
	}
	.password_headers_heading
	{
		color: #66757f;
		margin-top: 8px;
		margin-left: 8px;
		font-weight: lighter;
	}
	.password_headers_paragraph
	{
		color: #8899a6;
		margin-top: 5px;
		margin-left: 8px;
		font-size: 14px;
	}
	td
    {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .td1
    {
        width:150px;
        text-align: right;
        font-size: 14px;
        color:#292f33;
    }
    .td2
    {
        padding-left: 20px;
        color: red;
        font-size: 16px;
    }
    input
    {
        width: 280px;
        font-size: 14px;
        padding:8px 3px 8px 3px;
        border:1px solid #61e8ed;
        border-radius: 3px;
        /*outline: none;*/
    }
    .submit_button
    {
        background-color: #55acee;
        color: white;
        font-weight: bold;
        font-size: 16px;
        padding: 10px;
        border: 1px solid #3b88c3;
        margin-left: 175px;
        margin-top: 40px;
    }
	</style>

</head>
<body>
	<div class="change_password_setting">
		<div class="password_headers">
			<h2 class="password_headers_heading">Account</h2>
	        <p class="password_headers_paragraph">Change password settings.</p>
	    </div>
	    <div>

	    <form method="post" action="">
	    	<table>
                <tr><td class="td1">Password</td><td class="td2"><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"></td></tr>

                <tr><td></td><td class="td2"><p><?php if(isset($err['password'])) echo $err['password']; ?></p></td></tr>

                <tr><td class="td1">New Password</td><td class="td2"><input type="password" name="new_password" value="<?php if(isset($_POST['new_password'])) echo $_POST['new_password']; ?>"></td></tr>

                <tr><td></td><td class="td2"><p><?php if(isset($err['new_password'])) echo $err['new_password']; ?></p></td></tr>

                <tr><td class="td1">Verify Password</td><td class="td2"><input type="password" name="verify_password" value="<?php if(isset($_POST['verify_password'])) echo $_POST['verify_password']; ?>"></td></tr>

                <tr><td></td><td class="td2"><p><?php if(isset($err['verify_password'])) echo $err['verify_password']; ?></p></td></tr>

                <tr><td></td><td class="td2"><p><?php if(isset($err['match_password'])) echo $err['match_password']; ?></p></td></tr>

            </table>
            <input type="submit" class="submit_button" value="Save changes">
		</form>
          
        <br>  
		<center><h2><?php if(isset($err['congrats'])) echo $err['congrats']; ?></h2></center>

        </div>
	</div>
</body>
</html>