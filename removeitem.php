<?php
session_start();
include 'phpincludes/conn.php';

$_SESSION["Remove_Cart_Error"]="";
$_SESSION["Remove_Cart_Success"]="";

$ID = $_REQUEST["ID"];
$Table_Name = $_SESSION["AccountName"];

$_SESSION["BasketID"]=$Table_Name;

$ID_Min="1";
$ID_Max="21";

if(empty($ID) or ($ID < $ID_Min) or ($ID > $ID_Max))
{
  print_r("</br>");
  //No URL encoded string
  $_SESSION["Remove_Cart_Success"]="False";
  $_SESSION["Remove_Cart_Error"]="An invalid product was attempted to be remove from your cart. Cancelling request.";
  header("Location: viewcart.php");
}
else
{
  print_r("</br>");
  //Code to create new table if one doesn't exist that is the users cart
  
  $result = $conn->query("SHOW TABLES LIKE '".$Table_Name."'");
  if($result->num_rows == 1) 
  {
    //If the table exists add the item
    $stmt = $conn->prepare("DELETE FROM `".$Table_Name."` WHERE Prod_ID=?");
    $stmt->bind_param("s", $ID);
    
    $result = $stmt->execute();

    if($result===TRUE)
    {
      
      //Create a success message for use on cart page when the item has been added successfully to their database
      
      $result2 = $stmt2=$conn->query("SELECT * FROM `".$Table_Name."`");

      
      if($result2->num_rows == 0) 
      {
        $result = $stmt3=$conn->query("DROP TABLE `".$Table_Name."`");
        
        if($result === TRUE)
        {
          $_SESSION["Cart_Exist"]="False";
          $_SESSION["Remove_Cart_Success"]="True";
          header("Location: index.php");
        }
        else
        {
          print_r($sql->errorInfo()); 
        }
          
       }
      else
      {
        $_SESSION["Cart_Exist"]="True";
          $_SESSION["Remove_Cart_Success"]="True";
          header("Location: viewcart.php");
      }
      }
      else
      {
        $_SESSION["Cart_Exist"]="True";
        $_SESSION["Remove_Cart_Success"]="True";
        header("Location: viewcart.php");
      }
    }
    else
    {
      $_SESSION["Remove_Cart_Success"]="False";
      header("Location: viewcart.php");
    }
  
}
  //print_r("Unable to remove item from cart as it either didn't exist or is an invalid ID.");
    $conn->close();  

?>