<?php

session_start();
include 'phpincludes/conn.php';

function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_SESSION["Access_Level"]))
{
  if(isset($_REQUEST["submit"]))
  {
    $NewPass = generateRandomString();
    
    $salt = "$2y$10$2n0RmozQeNalwMbS9unKMOZNryBv.8gW8jrTOybs3TpQUSvdYaDOe";
    $ehash = sha1($salt.$NewPass);

    $ID = $_REQUEST["ID"];
    $stmt2=$conn2->prepare("UPDATE accs SET Password='".$ehash."' WHERE ID='".$ID."'");  

    $result2 = $stmt2->execute();

    if($result2 === TRUE or $result2 === 1)
    {
      $_SESSION["Success"]="Account with the ID of: " . $ID . "'s password was successfully updated to " . $NewPass . ".";
      $_SESSION["A_Option"]="Password Form";
      header("Location: manageaccounts.php");
    }
    else
    {
      $_SESSION["Error"]="Password for Account with the ID of: " . $ID . " failed to be updated!";
      $_SESSION["A_Option"]="Password Form";
      header("Location: manageaccounts.php");
    }

  }
}
else
{
  header("Location: manageaccounts.php");
}    
?>