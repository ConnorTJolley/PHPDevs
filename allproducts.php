<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Main Page for Pactrol Controls">
    <meta name="author" content="Connor Jolley | Connor.jolley@emerson.com">
    <link rel="icon" href="imgs/favicon.png">

    <title>404 &middot; Life not Found</title>

    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/carousel.css" rel="stylesheet">
    <!--Prompt for accepting Cookies / Javascript-->
    <script src="CSS/cprompt.js"></script>
    <script src="CSS/cprompt.min.js"></script>
  </head>
  <body>
    <?php
      session_start();
          
              if(isset($_SESSION["Access_Level"]))
              {
                if($_SESSION["Access_Level"]=="A")
                {
                  include 'phpincludes/admin_products_navbar.php';
                }
                else if($_SESSION["Access_Level"]=="S")
                {
                  include 'phpincludes/staff_products_navbar.php';
                }
                else if($_SESSION["Access_Level"]=="U")
                {
                  include 'phpincludes/products_navbar.php';
                }    
              }
              else
              {
                include 'phpincludes/products_navbar.php';
              }
    ?>
    <main role="main">
      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <!-- START THE FEATURETTES -->
        <div>
          </br>
          </div>
        </br>
        <div class="row">
        
            <?php
          
             include 'phpincludes/viewallproducts.php'
            ?>
        </div><!-- /.row -->
        <hr class="featurette-divider">
      </div><!-- /.container -->
      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <a href="http://www.emerson.com/en-us/privacy-notice">Legal</a> Copyright © 404 Life not Found, 2017 All rights reserved
      </footer>

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="CSS/popper.min.js"></script>
    <script src="CSS/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="CSS/holder.min.js"></script>
  </body>
</html
