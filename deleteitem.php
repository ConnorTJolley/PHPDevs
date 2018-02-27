<?php
session_start();
include 'phpincludes/conn.php';
include 'phpincludes/statecheck.php';
$_SESSION["Add_Cart_Error"]="";
$_SESSION["Add_Cart_Success"]="";

$ID = $_REQUEST["ID"];

$ID_Min="1";
$ID_Max="21";

if(empty($ID) or ($ID < $ID_Min) or ($ID > $ID_Max))
{
  header("Location: index.php");
}
else
{
  //Code to create new table if one doesn't exist that is the users cart
  $sql = "DELETE FROM `products` WHERE `ID` = '".$ID."'";
 
  //Prepare our DELETE statement.
  $statement = $conn->prepare($sql);
  
  //Execute our DELETE statement.
  $delete = $statement->execute();
  
  if($delete == TRUE)
  {
    $_SESSION["Add_Cart_Success"]="Successfully Deleted Product with ID: " . $ID;
    header("Location: index.php");
    
  }
  else
  {
    $_SESSION["Add_Cart_Error"]="Unsuccessful when deleting Product with ID: " . $ID;
    header("Location: index.php");
  }
 }

?>