<?php


if(isset($_SESSION["Logged_In"]))
{
  if($_SESSION["Logged_In"]=="True")
  {
    //Nothing as they are logged in
  }
  else if($_SESSION["Logged_In"]=="False")
  {
    header("Location: login.html");
  }
  else if($_SESSION["Logged_In"]=="")
  {
    header("Location: login.html");
  }
}
else
{
  header("Location: login.html");
}


?>