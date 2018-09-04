<?php
  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");

  if($_POST)
  {
    mysql_query("update login10 set question='$_POST[question]',answer='$_POST[answer]',
      father_name='$_POST[father_name]',contact='$_POST[contact]',address='$_POST[address]',
      date_of_birth='$_POST[date_of_birth]',sex='$_POST[sex]',city='$_POST[city]',
      state='$_POST[state]',country='$_POST[country]' where username='$_SESSION[username]'");

    $_SESSION['question'] = $_POST['question'];
    $_SESSION['answer'] = $_POST['answer'];
    $_SESSION['father_name'] = $_POST['father_name'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['date_of_birth'] = $_POST['date_of_birth'];
    $_SESSION['sex'] = $_POST['sex'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['country'] = $_POST['country'];
  }
  else
  {
    $query = mysql_query("select * from login10 where username='$_SESSION[username]'", $con);
    
    if($query && ($num=mysql_num_rows($query)) == 1)
    {
        while($row=mysql_fetch_array($query))
        {
            $_SESSION['question'] = $row['question'];
            $_SESSION['answer'] = $row['answer'];
            $_SESSION['father_name'] = $row['father_name'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['date_of_birth'] = $row['date_of_birth'];
            $_SESSION['sex'] = $row['sex'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['state'] = $row['state'];
            $_SESSION['country'] = $row['country'];
        }
    }
  }

?>

<style type="text/css">
	.account_and_language_setting
	{
		background-color: white;
		width:600px;
		height: 900px;
		border:1px solid #eee;
        border-radius: 8px;
		/*margin: 20px 0 0 40px;*/
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
    .radio_class
    {
        width: 20px;
        /*font-size: 14px;
        padding:8px 3px 8px 3px;
        border:1px solid #e1e8ed;
        border-radius: 3px;*/
    }
    textarea
    {
        width:280px;
        height:80px;
        font-size: 14px;
        padding:8px 3px 8px 3px;
        border:1px solid #61e8ed;
        border-radius: 3px;
    }
    select
    {
        width:280px;
        font-size: 14px;
        padding:5px 0 5px 3px;
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

	<div class="account_and_language_setting">
		<div class="account_headers">
			<h2 class="account_headers_heading">Account</h2>
	        <p class="account_headers_paragraph">Change your basic account and language settings.</p>
	    </div>
	    <div>

	    <form method="post" action="">
	    	<table>
                <tr><td class="td1">Full Name</td><td class="td2"><input type="text" name="full_name" readonly value="<?php if($_SESSION['full_name'] != "") echo $_SESSION['full_name']; ?>"></td></tr>
                <tr><td class="td1">Username</td><td class="td2"><input type="text" name="username" readonly value="<?php if($_SESSION['username'] != "") echo $_SESSION['username']; ?>"></td></tr>
                <tr><td class="td1">Question</td><td class="td2"><input type="text" name="question" value="<?php if($_SESSION['question'] != "") echo $_SESSION['question']; ?>"></td></tr>
                <tr><td class="td1">Answer</td><td class="td2"><input type="text" name="answer" value="<?php if($_SESSION['answer'] != "") echo $_SESSION['answer']; ?>"></td></tr>
                <tr><td class="td1">Father's Name</td><td class="td2"><input type="text" name="father_name" value="<?php if($_SESSION['father_name'] != "") echo $_SESSION['father_name']; ?>"></td></tr>
                <tr><td class="td1">Contact</td><td class="td2"><input type="text" maxlength="10" name="contact" value="<?php if($_SESSION['contact'] != "") echo $_SESSION['contact']; ?>"></td></tr>
                <tr><td class="td1">Address</td><td class="td2"><textarea name="address"><?php if($_SESSION['address'] != "") echo $_SESSION['address']; ?></textarea></td></tr>
                <tr><td class="td1">Date of Birth</td><td class="td2"><input type="date" name="date_of_birth" value="<?php if($_SESSION['date_of_birth'] != "") echo $_SESSION['date_of_birth']; ?>"></td></tr>

                <tr><td class="td1">Sex</td>
                	<td class="td2">
                		<input type="radio" class="radio_class" name="sex" value="male" <?php
                    if($_SESSION['sex'] == "")
                      echo "checked"; 
                    else if($_SESSION['sex'] == "male") 
                      echo "checked"; 
                    ?>>&nbsp;Male&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="radio_class" name="sex" value="female" <?php if($_SESSION["sex"] == "female") echo "checked"; ?>>&nbsp;Female
                  </td>
                </tr>

                <tr><td class="td1">City</td><td class="td2"><input type="text" name="city" value="<?php if($_SESSION['city'] != "") echo $_SESSION['city']; ?>"></td></tr>
                <tr><td class="td1">State</td><td class="td2"><input type="text" name="state" value="<?php if($_SESSION['state'] != "") echo $_SESSION['state']; ?>"></td></tr>
                <tr><td class="td1">Country</td>
                    <td class="td2">
                    	<select name="country">
                            <option <?php if($_SESSION['country'] == "India") echo "selected"; ?>>India</option>
                            <option <?php if($_SESSION['country'] == "USA") echo "selected"; ?>>USA</option>
                            <option <?php if($_SESSION['country'] == "Germany") echo "selected"; ?>>Germany</option>
                        </select>
                    </td>
                </tr>

            </table>
            <input class="submit_button" type="submit" value="Save changes">
		</form>

        </div>
	</div>