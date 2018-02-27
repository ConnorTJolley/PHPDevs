<?php

include 'phpincludes/conn.php';

session_start();

if(isset($_REQUEST["submit"]))
{
  $Option = $_REQUEST["Option"];
  $ID = $_REQUEST["ID"];
  
  print_r("Updating Account with ID of: " . $ID . " to the access level of " . $Option . ".");
  
  $stmt2=$conn2->prepare("UPDATE accs SET User_Level='".$Option."' WHERE ID='".$ID."'");
  print_r($conn2);   

  $result2 = $stmt2->execute();

  if($result2 === TRUE or $result2 === 1)
  {
    $_SESSION["Success"]="Access Level Updated Successfully!";
    $_SESSION["A_Option"]="Access Level Form";
    header("Location: manageaccounts.php");
  }
  else
  {
    $_SESSION["Error"]="Access Level Failed to be Updated!";
    $_SESSION["A_Option"]="Access Level Form";
    header("Location: manageaccounts.php");
  }
}
else
{
  header("Location: manageaccounts.php");
}


?>