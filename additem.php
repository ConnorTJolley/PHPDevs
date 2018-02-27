<?php
session_start();
include 'phpincludes/conn.php';
include 'phpincludes/statecheck.php';
$_SESSION["Add_Cart_Error"]="";
$_SESSION["Add_Cart_Success"]="";

$ID = $_REQUEST["ID"];
$Table_Name = $_SESSION["AccountName"];

$_SESSION["BasketID"]=$Table_Name;

$ID_Min="1";
$ID_Max="21";

if(empty($ID) or ($ID < $ID_Min) or ($ID > $ID_Max))
{
  print_r("</br>");
  //No URL encoded string
  $_SESSION["Add_Cart_Success"]="False";
  $_SESSION["Add_Cart_Error"]="An invalid product was attempted to be added to cart. Cancelling request.";
  header("Location: index.php");
}
else
{
  print_r("</br>");
  //Code to create new table if one doesn't exist that is the users cart
  
  $result = $conn->query("SHOW TABLES LIKE '".$Table_Name."'");
  if($result->num_rows == 1) 
  {
    //If the table exists add the item
    $stmt = $conn->prepare("INSERT INTO `".$Table_Name."` (Prod_ID) VALUES (?)");
    $stmt->bind_param("s", $ID);
    $result = $stmt->execute();

    if($result===TRUE)
    {
      $_SESSION["Cart_Exist"]="True";
      $_SESSION["Add_Cart_Success"]="True";
      //Create a success message for use on cart page when the item has been added successfully to their database
      header("Location: index.php");
    }
    else
    {
      $_SESSION["Add_Cart_Success"]="False";
      header("Location: index.php");
    }
  }
  else 
  {
    $sql2 = "CREATE TABLE `".$Table_Name."` (Basket_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Prod_ID INT(5) NOT NULL)";
    
    if ($conn->query($sql2) === TRUE) 
    {
        //If creating the table is successfull
        //Add item
        $stmt = $conn->prepare("INSERT INTO `".$Table_Name."` (Prod_ID) VALUES (?)");
        $stmt->bind_param("s", $ID);
        $result = $stmt->execute();

        if($result===TRUE)
        {
          $_SESSION["Cart_Exist"]="True";
          $_SESSION["Add_Cart_Success"]="True";
          //Create a success message for use on cart page when the item has been added successfully to their database
          header("Location: index.php");
        }
        else
        {
          $_SESSION["Add_Cart_Success"]="False";
          header("Location: index.php");
        }
    } 
    else 
    {
      echo "Error creating table: " . $conn->error;
      print_r("</br>");
      //Something wrong with the creating table SQL query as it returns a FALSE
        print_r("query was FALSE");
        //If creating table fails
        $_SESSION["Add_Cart_Error"]=$conn->error;
    }

    $conn->close();
  }
}

?>