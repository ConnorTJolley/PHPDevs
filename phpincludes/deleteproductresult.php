<?php

if(isset($_SESSION["Add_Cart_Success"]))
{
  print_r("<center><h3>");
  if($_SESSION["Add_Cart_Success"]=="True")
  {
    $_SESSION["Add_Cart_Success"]="";
    print_r("Successfully deleted product!");
    print_r("<form method='POST' action='index.php'>");
    print_r("<button class='btn btn-sm btn-primary btn-block' type='submit' onClick='".$_SESSION["Add_Cart_Success"]="". "name='submit'>X</button>");
    print_r("</form>");
  }
  else if($_SESSION["Add_Cart_Success"]=="False")
  {
    print_r("Sorry... Something went wrong when attempting to delete the item you selected, we will work quickly to try and resolve this!");
    print_r("<form method='POST' action='index.php'>");
    print_r("<button class='btn btn-sm btn-primary btn-block' type='submit' onClick='".$_SESSION["Add_Cart_Success"]="". "name='submit'>X</button>");
    print_r("</form>");
  }
  else if($_SESSION["Add_Cart_Success"]=="")
  {
    //Nothing
  }
  print_r("</h3></center>");
}

print_r("</br>");
print_r("</br>");
print_r("</br>");
       







?>