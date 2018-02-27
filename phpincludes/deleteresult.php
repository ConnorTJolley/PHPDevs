<?php

if(isset($_SESSION["Remove_Cart_Success"]))
{
  
  if($_SESSION["Remove_Cart_Success"]=="True")
  {
    print_r("<center><h3>");
    $_SESSION["Remove_Cart_Success"]="";
    print_r("Successfuly removed from cart!");
    print_r("<form method='POST' action='viewcart.php'>");
    print_r("<button class='btn btn-sm btn-primary btn-block' type='submit' onClick='".$_SESSION["Remove_Cart_Success"]="". "name='submit'>X</button>");
    print_r("</form>");
    print_r("</h3></center>");
    print_r("</br>");
    print_r("</br>");
  }
  else if($_SESSION["Remove_Cart_Success"]=="False")
  {
    print_r("<center><h3>");
    print_r("Sorry... Something went wrong when attempting to Remove the item you selected from your cart, we will work quickly to try and resolve this!");
    print_r("<form method='POST' action='viewcart.php'>");
    print_r("<button class='btn btn-sm btn-primary btn-block' type='submit' onClick='".$_SESSION["Remove_Cart_Success"]="". "name='submit'>X</button>");
    print_r("</form>");
    print_r("</h3></center>");
    print_r("</br>");
    print_r("</br>");
  }
  else if($_SESSION["Remove_Cart_Success"]=="")
  {
    //Nothing
  }
  
}

?>