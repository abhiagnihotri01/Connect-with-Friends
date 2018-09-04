<?php
  session_start();

  $s = "";

  $con = mysql_connect("localhost","root","abhinav") or die("can not connect to database");
  mysql_select_db("database1");


?>

<style type="text/css">
  #search_list_div
  {
    width:350px;
    height:auto;
    border:1px solid #aaa;
    border-radius: 6px;
    background-color: white;
    margin-top: 2px;
    padding-top: 8px;
    padding-bottom: 8px;
  }
  #search_ul_list
  {
    width:100%;
    height:100%;
    list-style: none;
    
  }
  #search_li_list
  {
    width:100%;
    height:50px;
    line-height: 50px;
    /*vertical-align: middle;*/
  }
  #search_link
  {
    text-decoration: none;
    display: block;
    line-height: 50px;
  }
  #search_img
  {
    width:40px;
    height: 40px;
    margin-left: 8px;
    vertical-align: middle;
    border-radius: 4px;
    background-color: blue;
  }
  #full_name_span
  {
    color: black;
    font-weight: bold;
  }
  #username_span
  {
    color:#66757f;
    font-size: 14px; 
  }
</style>
<script src="jquery-2.1.4.js"></script>
<script>
function change_font_color1(obj)
{
  obj.childNodes[1].style.color="white";
  obj.childNodes[2].style.color="white";
  obj.style.background="red";
}
function change_font_color2(obj)
{
  obj.childNodes[1].style.color="black";
  obj.childNodes[2].style.color="#66757f";
  obj.style.background="white";
}

function open_others_profile(obj)
{
        var b=obj.childNodes[1].innerHTML;
        var c=obj.childNodes[2].innerHTML;

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

<div id="search_list_div">
<?php
  $query=mysql_query("select full_name,username from login10 where username like '$_POST[search]%'");
   //$query=mysql_query("select full_name,username from login10");
  $i=1;
  /*if($_POST['search'] == "a")
    header("Location:login.php");*/
  if($query && ($num=mysql_num_rows($query)) > 0)
  {
    
    echo "<ul id=search_ul_list>";
    while(($row=mysql_fetch_array($query)) && $i<=10)
    {
      echo "<li id=search_li_list>";
      echo "<a href='others_profile.php' id='search_link' onmouseover='change_font_color1(this);' onmouseout='change_font_color2(this);' onclick='open_others_profile(this);'>";
      
      if(file_exists("accounts/$row[username]/profile_image.jpg"))
        echo "<img src='accounts/$row[username]/profile_image.jpg' id='search_img'/>"; 
      else
        echo "<img src='images/profile_image1.jpg' id='search_img'/>";
      
      echo "<span id='full_name_span'>$row[full_name]</span><span id='username_span'> @$row[username]</span>";
      echo "</a>";
      echo "</li>";
      $i++;

    }
    echo "</ul>";
    //$_SESSION['returned_value'] = $s;
    //echo $s;
    //echo "success";
  }
  
?>
</div>