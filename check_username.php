<?php

include 'phpincludes/conn.php';
//check if the username already exists

$Username_Set = $_REQUEST["q"];

$stmt = $conn->prepare("SELECT * FROM accs WHERE Username=?");

$stmt->bind_param("s", $Username_Set);

$stmt->execute();

$stmt->bind_result($ID,$Username,$Password, $Access_Level);

if(!empty($stmt->fetch()))
{
  $_SESSION["UsernameFree"]="False";
  echo("<h3><b>Username is in use!</b></h3>");
  return true; 
}
else
{
  $_SESSION["UsernameFree"]="True";
  echo("<h3><b>Username is available!</b></h3>");
  return false;   
}


?>