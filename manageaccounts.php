<?php

session_start();

include 'phpincludes/conn.php';

if(isset($_SESSION["Access_Level"]))
{
  if($_SESSION["Access_Level"]=="A")
  {
    include 'phpincludes/manage_accounts_navbar.php';
  }
  else if($_SESSION["Access_Level"]=="S")
  {
    header("Location: index.php");
  }
  else if($_SESSION["Access_Level"]=="U")
  {
    header("Location: index.php");
  }    
}
else
{
  header("Location: index.php");
}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Main Page for Pactrol Controls">
    <meta name="author" content="Connor Jolley | Connor.jolley@emerson.com">
    <link rel="icon" href="imgs/favicon.png">

    <title>Manage &middot; Accounts</title>

    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/carousel.css" rel="stylesheet">
  </head>
  <body>
    
  <main role="main">
    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <!-- START THE FEATURETTES -->
    </div>
<body>
  <center>
    </br>
  <h1>Manage Accounts!</h1>
    </br>
    
  <?php
    
   echo("<form method='POST' action='". $_SERVER['PHP_SELF'] ."'>");
          ?>
            <select id="A_Option" name="A_Option">
              <option value="Access Level">Access Level Management</option>
              <option value="Password Recovery">Password Recovery</option>
            </select>
            <input type="submit" name="admin_submit" value="Open!">
    </form>
    
    <?php
    
    if(isset($_REQUEST["admin_submit"]))
    {
      $A_Option = $_REQUEST["A_Option"];
      
      if($A_Option == "Access Level")
      {
        ?>
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-t2cw{font-weight:bold;text-decoration:underline;text-align:center;vertical-align:top}
          .tg .tg-yw4l{vertical-align:top}
          </style>  
              <?php

              if(isset($_SESSION["Success"]))
              {
                if(empty($_SESSION["Success"]))
                {

                }
                else if($_SESSION["Success"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Success"]);
                  $_SESSION["Success"]="";
                }
              }
              else if(isset($_SESSION["Error"]))
              {      
                if(empty($_SESSION["Error"]))
                {

                }
                else if($_SESSION["Error"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Error"]);
                  $_SESSION["Error"]="";
                }
              }

              ?>
            <table class="tg">
            <tr>

              <th class="tg-yw4l"><b><u>Account ID</u></b></th>
              <th class="tg-yw4l"><b><u>Username</u></b></th>
              <th class="tg-yw4l"><b><u>User_Level</u></b></th>
              <th class="tg-yw4l"><b><u>Update Access Level</u></b></th>
            </tr>
              <?php

              //sql to select all users here

              if ($stmt = $conn->prepare("SELECT * FROM accs")) 
              {
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php
                while ($row = $result->fetch_assoc())
                { 
                  $ID = $row["ID"];
                  ?>
                    <tr>
                    <td class="tg-yw4l"><?php print_r($row["ID"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Username"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["User_Level"]); ?></td>
                    <td class="tg-yw4l" colspan="2">
                    <?php
                    echo("<form method='POST' action='UpdateACC.php?ID=" . htmlentities($ID) . "'>");
                    ?>
                      <select id="Option" name="Option">
                        <?php
                         if($row["User_Level"]=="U")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="S")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="S")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="A")
                         {
                           ?>
                            <option value="A">A</option>
                           <?php
                         }

                        ?>              
                      </select>
                      <button id="submit" name="submit" class="btn btn-success">Update</button>
                      </form>
                     <!--Form here to update access level-->

                    </td>
                    </tr>
                  <?php
                }
              }
              //echo all the table columns 
              ?>
            </table>
        <?php
      }
      else if($A_Option == "Password Recovery")
      {
        ?>
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-t2cw{font-weight:bold;text-decoration:underline;text-align:center;vertical-align:top}
          .tg .tg-yw4l{vertical-align:top}
          </style>  
              <?php

              if(isset($_SESSION["Success"]))
              {
                if(empty($_SESSION["Success"]))
                {

                }
                else if($_SESSION["Success"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Success"]);
                  $_SESSION["Success"]="";
                }
              }
              else if(isset($_SESSION["Error"]))
              {      
                if(empty($_SESSION["Error"]))
                {

                }
                else if($_SESSION["Error"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Error"]);
                  $_SESSION["Error"]="";
                }
              }

              ?>
            <table class="tg">
            <tr>

              <th class="tg-yw4l"><b><u>Account ID</u></b></th>
              <th class="tg-yw4l"><b><u>Username</u></b></th>
              <th class="tg-yw4l"><b><u>Current Password</u></b></th>
              <th class="tg-yw4l"><b><u>Generate New Password</u></b></th>
            </tr>
              <?php

              //sql to select all users here

              if ($stmt = $conn->prepare("SELECT * FROM accs")) 
              {
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php
                while ($row = $result->fetch_assoc())
                { 
                  $ID = $row["ID"];
                  ?>
                    <tr>
                    <td class="tg-yw4l"><?php print_r($row["ID"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Username"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Password"]); ?></td>
                    <td class="tg-yw4l" colspan="2">
                    <?php
                    echo("<center><form method='POST' action='GenerateNewPass.php?ID=" . htmlentities($ID) . "'>");
                    ?>
                      <button id="submit" name="submit" class="btn btn-success">Generate</button>
                      </form></center>
                     <!--Form here to update access level-->

                    </td>
                    </tr>
                  <?php
                }
              }
              //echo all the table columns 
              ?>
            </table>
        <?php
        
      }
      else
      {
        //
      }
    }
    else if(isset($_SESSION["A_Option"]))
    {
      if($_SESSION["A_Option"]=="Password Form")
      {
        ?>
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-t2cw{font-weight:bold;text-decoration:underline;text-align:center;vertical-align:top}
          .tg .tg-yw4l{vertical-align:top}
          </style>  
              <?php

              if(isset($_SESSION["Success"]))
              {
                if(empty($_SESSION["Success"]))
                {

                }
                else if($_SESSION["Success"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Success"]);
                  $_SESSION["Success"]="";
                }
              }
              else if(isset($_SESSION["Error"]))
              {      
                if(empty($_SESSION["Error"]))
                {

                }
                else if($_SESSION["Error"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Error"]);
                  $_SESSION["Error"]="";
                }
              }

              ?>
            <table class="tg">
            <tr>

              <th class="tg-yw4l"><b><u>Account ID</u></b></th>
              <th class="tg-yw4l"><b><u>Username</u></b></th>
              <th class="tg-yw4l"><b><u>Current Password</u></b></th>
              <th class="tg-yw4l"><b><u>Generate New Password</u></b></th>
            </tr>
              <?php

              //sql to select all users here

              if ($stmt = $conn->prepare("SELECT * FROM accs")) 
              {
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php
                while ($row = $result->fetch_assoc())
                { 
                  $ID = $row["ID"];
                  ?>
                    <tr>
                    <td class="tg-yw4l"><?php print_r($row["ID"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Username"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Password"]); ?></td>
                    <td class="tg-yw4l" colspan="2">
                    <?php
                    echo("<center><form method='POST' action='GenerateNewPass.php?ID=" . htmlentities($ID) . "'>");
                    ?>
                      <button id="submit" name="submit" class="btn btn-success">Generate</button>
                      </form></center>
                     <!--Form here to update access level-->

                    </td>
                    </tr>
                  <?php
                }
              }
              //echo all the table columns 
              ?>
            </table>
        <?php
      }
      else if($_SESSION["A_Option"]=="Access Level Form")
      {
        ?>
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-t2cw{font-weight:bold;text-decoration:underline;text-align:center;vertical-align:top}
          .tg .tg-yw4l{vertical-align:top}
          </style>  
              <?php

              if(isset($_SESSION["Success"]))
              {
                if(empty($_SESSION["Success"]))
                {

                }
                else if($_SESSION["Success"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Success"]);
                  $_SESSION["Success"]="";
                }
              }
              else if(isset($_SESSION["Error"]))
              {      
                if(empty($_SESSION["Error"]))
                {

                }
                else if($_SESSION["Error"]=="")
                {

                }
                else
                {
                  print_r("</br>" . $_SESSION["Error"]);
                  $_SESSION["Error"]="";
                }
              }

              ?>
            <table class="tg">
            <tr>

              <th class="tg-yw4l"><b><u>Account ID</u></b></th>
              <th class="tg-yw4l"><b><u>Username</u></b></th>
              <th class="tg-yw4l"><b><u>User_Level</u></b></th>
              <th class="tg-yw4l"><b><u>Update Access Level</u></b></th>
            </tr>
              <?php

              //sql to select all users here

              if ($stmt = $conn->prepare("SELECT * FROM accs")) 
              {
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php
                while ($row = $result->fetch_assoc())
                { 
                  $ID = $row["ID"];
                  ?>
                    <tr>
                    <td class="tg-yw4l"><?php print_r($row["ID"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["Username"]); ?></td>
                    <td class="tg-yw4l"><?php print_r($row["User_Level"]); ?></td>
                    <td class="tg-yw4l" colspan="2">
                    <?php
                    echo("<form method='POST' action='UpdateACC.php?ID=" . htmlentities($ID) . "'>");
                    ?>
                      <select id="Option" name="Option">
                        <?php
                         if($row["User_Level"]=="U")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="S")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="S")
                         {
                           ?>
                            <option value="U">U</option>
                            <option value="S">S</option>
                           <?php
                         }
                         else if($row["User_Level"]=="A")
                         {
                           ?>
                            <option value="A">A</option>
                           <?php
                         }

                        ?>              
                      </select>
                      <button id="submit" name="submit" class="btn btn-success">Update</button>
                      </form>
                     <!--Form here to update access level-->

                    </td>
                    </tr>
                  <?php
                }
              }
              //echo all the table columns 
              ?>
            </table>
        <?php
      }
      else
      {
        print_r("Please choose from the dropdown above what menu you would like to use.");
      }
    }
    else
    {
      print_r("Please choose from the dropdown above what menu you would like to use.");
    }
    
    ?>
  
   </center>
   </body>
</html>