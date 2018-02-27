<?php
 
//SQL database connection info
include 'conn.php';

//Use prepared SQL statements to check database against users credentials entered
if ($stmt = $conn->prepare("SELECT * FROM products")) 
{

  //execute query
  $stmt->execute();

  //bind the result into variables
  $result = $stmt->get_result();        //Had to install GET RESULT as while statement wasn't working with fetch
  
  //Code to install GET RESULT using SSH terminal
  
  //sudo apt-get install php5-mysqlnd
  
  //restart code
  
  //sudo /etc/init.d/apache2 restart

  while ($row = $result->fetch_assoc())
  { 
    ?>
      <div class="col-lg-4">
            <img class="rounded-square" src="<?php print_r($row["Image"]); ?>" alt="<?php print_r($row["Image"]); ?>" width="350" height="200">
            <h2><?php print_r($row["Prod_Name"]); ?></h2>
            <p>
            <?php print_r($row["Short_Desc"]); ?>
            </p>
            <p>
              <?php 
                if($row["Price"]==0)
                {
                  ?> <b>Free to Play</b> <?php
                }
                else
                {
                  ?> <b>£<?php print_r($row["Price"]); ?></b> <?php
                }
            ?>
            </p>
            <p>Platform: <img src="<?php print_r($row["Platform"]); ?>" alt="Product Image" height="40px" width="100px"></p>
            <p class="lead">
             <?php 
                if(isset($_SESSION["Logged_In"]))
                {
                  $ID = $row["ID"];
                   if($_SESSION["Logged_In"]=="True")
                   {
                        echo '<a class="btn btn-sm btn-primary" href="additem.php?ID=' . urlencode($ID) .  '">Add to Cart</a>';
                        echo("</br>");
                        if($_SESSION["Access_Level"]=="A")
                        {
                          echo('<a class="btn btn-sm btn-secondary" href="deleteitem.php?ID=' . urlencode($ID) .  '">Delete Product</a>');
                          
                        }
                        else if($_SESSION["Access_Level"]=="S")
                        {
                          echo('<a class="btn btn-sm btn-secondary" href="delete.php?ID=' . urlencode($ID) .  '">Delete Product</a>');
                        }
                        else
                         {

                         }
                   }
                   else
                   {
                     ?>
                        <a class="btn btn-sm btn-secondary" href="login.html">Login to add to Cart</a>
                     <?php
                   }
                 }
                 else
                 {
                   ?>
                      <a class="btn btn-sm btn-secondary" href="login.html">Login to add to Cart</a>
                   <?php
                 }
    
              ?>
            
            </p>
          </div><!-- /.col-lg-4 -->
    <?php
  }

  $stmt->close();
}

?>
  
  
  
