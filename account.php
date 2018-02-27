<?php

session_start();

if(isset($_SESSION["Access_Level"]))
{
  if($_SESSION["Access_Level"]=="A")
  {
    include 'phpincludes/admin_account_navbar.php';
  }
  else if($_SESSION["Access_Level"]=="S")
  {
    include 'phpincludes/staff_account_navbar.php';
  }
  else if($_SESSION["Access_Level"]=="U")
  {
    include 'phpincludes/account_navbar.php';
  }    
}
else
{
  header("Location: login.html");
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

    <title>404 &middot; Account Management</title>

    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/form.css" type="text/css"/>
    <script type="text/javascript" src="CSS/form.js"></script>
    <script type="text/javascript">
      H5F.listen(window,"load",function () {
        H5F.setup(document.getElementById("signup"));
      },false);
    </script>
    <!--Prompt for accepting Cookies / Javascript-->
    <script src="CSS/cprompt.js"></script>
    <script src="CSS/cprompt.min.js"></script>
  </head>
  <body>
    
  <main role="main">
    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <!-- START THE FEATURETTES -->
        <div>
          </br>
        <center>
      <b>
      <?php 
      
      if(isset($_SESSION["Success"]))
      {
        if($_SESSION["Success"]=="")
        {
          
        }
        else
        {
          print_r($_SESSION["Success"]);
        }
      }
      else 
      {
        if(isset($_SESSION["Update_Error"]))
        {
          if($_SESSION["Update_Error"]=="")
          {

          }
          else
          {
            print_r($_SESSION["Update_Error"]);
          }
        }
        
      }
    
      ?>
        </b>
      </center>
        </div>
      <p>
        </head>
        <body>
          </br>
          </br>
         <form id="signup" method="POST" action="pass_update.php">
          <h1>Update Password!</h1>
          <h2>Fields marked (*) are required</h2>
          </br>
          <fieldset>
           <ol>
            <li>
             <label for="password">Password*</label>																																																				<!-- Minimum 8 chars 1 number 1 upper & lower case,  A-Z caps or a-z lower case     -->
             <input id="password" name="Old_Password" type="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required /> 
             <p class="validation01">
              <span class="invalid">Minimum 8 characters, one number, one uppercase letter and one lowercase letter</span>
              <span class="valid">Your password meets our requirements, thank you.</span>
             </p>
            </li>
           </ol>
           <ol>						
            <li>
             <label for="password">New Password*</label>																																																				<!-- Minimum 8 chars 1 number 1 upper & lower case,  A-Z caps or a-z lower case     -->
             <input id="password" name="New_Password_1" type="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required /> 
             <p class="validation01">
              <span class="invalid">Minimum 8 characters, one number, one uppercase letter and one lowercase letter</span>
              <span class="valid">Your password meets our requirements, thank you.</span>
             </p>
            </li>
             <li>
             <label for="password">Please Retype New Password*</label>																																																				<!-- Minimum 8 chars 1 number 1 upper & lower case,  A-Z caps or a-z lower case     -->
             <input id="password" name="New_Password_2" type="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required /> 
             <p class="validation01">
              <span class="invalid">Minimum 8 characters, one number, one uppercase letter and one lowercase letter</span>
              <span class="valid">Your password meets our requirements, thank you.</span>
             </p>
            </li>
           </ol>
           </fieldset>
          <center>
            <input type="submit" name="submit" value="Update Password" />
            </br>
           </br>
          </form>
    </p>
        <hr class="featurette-divider">
    </div><!-- /.container -->
      <!-- FOOTER -->
<footer class="container">
  <p class="float-right"><a href="#">Back to top</a></p>
  <a href="">Legal</a> Copyright © 404 Life not Found, 2017 All rights reserved
</footer>

    </main>
  
  </body>
