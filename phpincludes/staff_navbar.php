<?php

if(isset($_SESSION["Logged_In"]))
{
  if($_SESSION["Logged_In"]=="True")
  {
    ?>
      <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="index.php">404 LnF</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allproducts.php">Products</a>
              </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
            </li>
            <?php
             if(isset($_SESSION["Cart_Exist"]))
             {
               if($_SESSION["Cart_Exist"]=="True")
               {
                 ?>
                  <li class="nav-item">
                      <a class="nav-link" href="viewcart.php">Cart</a>
                  </li>
                <?php
               }
               else
               {
                 //Don't make a link
               }
             }
             else
             {
               //Don't make a link
             }
    
            ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
          </div>
        </nav>
      </header>
    <?php
  }
  else
  {
    ?>
      <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="index.php">404 LnF</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allproducts.php">Products</a>
              </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            </ul>
          </div>
        </nav>
      </header>
    <?php
  } 
}
else
{
  ?>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="index.php">404 LnF</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allproducts.php">Products</a>
              </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            </ul>
          </div>
        </nav>
      </header>
  <?php
}

?>