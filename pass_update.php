<?php

session_start();
include 'phpincludes/conn.php';

if(isset($_SESSION["Access_Level"]))
{
  if(isset($_REQUEST["submit"]))
  {
    $Old_Pass=$_REQUEST["Old_Password"];
    $New_Pass_1=$_REQUEST["New_Password_1"];
    $New_Pass_2=$_REQUEST["New_Password_2"];
    
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    $regex_result = preg_match($pattern, $New_Pass_1);
    if($regex_result == 1 || $regex_result == TRUE)
    {
      $salt = "$2y$10$2n0RmozQeNalwMbS9unKMOZNryBv.8gW8jrTOybs3TpQUSvdYaDOe";
      $ehash = sha1($salt.$Old_Pass);

      $Username = $_SESSION["Username"];

      if ($stmt = $conn->prepare("SELECT * FROM accs WHERE Username=? AND Password=?")) 
      {


        //bind paramaters using username and encrypted password
        $stmt->bind_param("ss", $Username, $ehash);

        //execute query
        $stmt->execute();

        //bind the result into variables
        $stmt->bind_result($ID,$Username,$Password,$Access_Level);
        //need to create an access level and assign that as a result too


        //Need to create a check for access level in the redirect.php page


        //if the fetch of the results isnt empty
        if(!empty($stmt->fetch()))
        {
          $Acc_ID=$_SESSION["ID"];
          print_r("Found");

           if($New_Pass_1===$New_Pass_2)
           {
             $stmt->close();
              print_r("Matches");
              $ehash2 = sha1($salt.$New_Pass_1);

              $stmt2=$conn2->prepare("UPDATE accs SET Password='".$ehash2."' WHERE ID='".$Acc_ID."'");
              print_r($conn2);   

              $result2 = $stmt2->execute();

              if($result2 === TRUE or $result2 === 1)
              {
                $_SESSION["Success"]="Password updated successfully";
                header("Location: account.php");
              }
              else
              {
                $_SESSION["Update_Error"]="Password failed to be updated!";
                header("Location: account.php");
              }
           }
           else
           {
             $_SESSION["Update_Error"]="New Password's do not match! Please try again!";
             header("Location: account.php");
           }
        }
        else
        {
          $_SESSION["Update_Error"]="Old Password is incorrect!";
          header("Location: account.php");
        }
      }
    }
    else
    {
      echo("<center><h3>Password does not meet the requirements!</h3> </br> <p>Passwords must contain a minimum of 8 characters, one number, one uppercase letter and one lowercase letter");
      header("Refresh:2; url=account.php");
    }
  }
  else
  {
    header("Location: login.html");
  }    
}
else
{
  header("Location: login.html");
}

?>