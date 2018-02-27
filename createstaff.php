<?php

session_start();

if(isset($_SESSION["Access_Level"]))
{
  if($_SESSION["Access_Level"]=="A")
  {
    include 'phpincludes/create_staff_navbar.php';
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

    <title>404 &middot; Create Staff</title>

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
          </br>
          </br>
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
        $_SESSION["Success"]="";
      }
      else 
      {
        if(isset($_SESSION["Error"]))
        {
          if($_SESSION["Error"]=="")
          {

          }
          else
          {
            print_r($_SESSION["Error"]);
          }
          $_SESSION["Error"]="";
        }
        
      }
    
      ?>
        <!DOCTYPE html>
<html>
<head>
<title>Admin Register &middot; 404 LnF</title>
<link rel="stylesheet" href="CSS/form.css" type="text/css"/>
<script type="text/javascript" src="CSS/form.js"></script>
<script type="text/javascript">
		H5F.listen(window,"load",function () {
			H5F.setup(document.getElementById("signup"));
		},false);
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">
  
  function checkUsername(str) {
  if (str.length==0) { 
    document.getElementById("usernameResult").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) 
    {
      document.getElementById("usernameResult").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","check_username.php?q="+str,true);
  xmlhttp.send();
}
 
  </script>
</head>
<body>
 <form id="signup" method="POST" action="insert_staff_acc.php">
  <h1>Create Staff Account!</h1>
  <h2>Fields marked (*) are required</h2>
  <?php 
   if(isset($_SESSION["Error"]))
    {
      if($_SESSION["Error"]=="")
      {

      }
      else
      {
        print_r($_SESSION["Error"]);
      }
      $_SESSION["Error"]="";
    } 
   ?>
  <fieldset>
   <ol>
    <li>
     <label for="firstname">Username *</label> 
     <input type="text" id="username" name="Username" onfocusout="checkUsername(this.value)" placeholder="Username" required />
    	<p id="usernameResult"></p>
		 </li>
   </ol>
   <ol>						
    <li>
     <label for="password">Your Password *</label>																																																				<!-- Minimum 8 chars 1 number 1 upper & lower case,  A-Z caps or a-z lower case     -->
     <input id="password" name="Password" type="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required /> 
     <p class="validation01">
      <span class="invalid">Minimum 8 characters, one number, one uppercase letter and one lowercase letter</span>
      <span class="valid">Your password meets our requirements, thank you.</span>
     </p>
    </li>
     <li>
     <label for="password">Admin Password *</label>																																																				<!-- Minimum 8 chars 1 number 1 upper & lower case,  A-Z caps or a-z lower case     -->
     <input id="password" name="AdminP" type="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required /> 
     <p class="validation01">
      <span class="invalid">Minimum 8 characters, one number, one uppercase letter and one lowercase letter</span>
      <span class="valid">The password meets our requirements, but might be incorrect.</span>
     </p>
    </li>
   </ol>
	 </fieldset>
  <center>
		<input type="submit" name="submit" value="Create Account!" />
		</br>
	 </br>
	</form>
	<link rel="shortcut icon" href="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Register Page">
    <meta name="author" content="Connor Jolley">
    <link rel="icon" href="">

    <title>Login &middot; 404 Life not Found</title>

    <!-- Bootstrap core CSS -->
		<!--<link href="CSS/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
</head>

  <body>
		
  </body>
</html>
