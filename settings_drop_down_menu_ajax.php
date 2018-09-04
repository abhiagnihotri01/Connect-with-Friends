<?php
  session_start();

  
?>

<style type="text/css">
  
  #settings_ul_list
  {
    width:160px;
    height:auto;
    list-style: none;
    background-color: white;
    border-radius: 4px;
    margin-top: 2px;
    padding-top: 6px;
    padding-bottom: 6px;
  }
  #settings_li_list
  {
    width:100%;
    height:50px;
    border-bottom: 1px solid #aaeeee;
  }
  #settings_link1
  {
    text-decoration: none;
    display: block;
    color:#66757f;
    font-size: 14px;
    padding: 10px 0 10px 10px;
    /*margin-top: 10px;*/
  }
  #settings_link
  {
    text-decoration: none;
    display: block;
    color:#66757f;
    font-size: 14px;
    padding-left: 10px;
    line-height: 50px;
    /*margin-top: 10px;*/
  }
  #settings_link:hover
  {
    color: white;
    background-color: red;
  }
  #full_name_div
  {
    font-size: 16px;
    color: black;
    font-weight: bold;
  }
  /*#
  {
    color:#66757f;
    font-size: 14px; 
  }*/
</style>
<script type="text/javascript">
function change_font_color1(obj)
{
  obj.style.color="white";
  document.getElementById("full_name_div").style.color="white";
  obj.style.background="red";
}
function change_font_color2(obj)
{
  document.getElementById("full_name_div").style.color="black";
  obj.style.color="#66757f";
  obj.style.background="white";
}
</script>

<div>
  <ul id="settings_ul_list">
    <li id="settings_li_list">
      <a href='profile.php' id="settings_link1" onmouseover="change_font_color1(this);" onmouseout="change_font_color2(this);">
        <div id="full_name_div"><?php echo $_SESSION['full_name']; ?></div>view profile
        <!--<div>view profile</div>-->
      </a>
    </li>

    <li id="settings_li_list">
      <a href='#' id="settings_link">
        Help
      </a>
    </li>

    <li id="settings_li_list">
      <a href='account_settings.php' id="settings_link">
        Settings
      </a>
    </li>

    <li id="settings_li_list" style="border-bottom:none;">
      <a href='logout.php' id="settings_link">
        Log out
      </a>
    </li>
  </ul>
</div>