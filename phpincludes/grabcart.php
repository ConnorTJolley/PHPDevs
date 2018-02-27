<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
  
.tf {border-collapse:collapse;border-spacing:0;}
.tf td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-width:0px;overflow:hidden;word-break:normal;}
.tf th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-width:0px;overflow:hidden;word-break:normal;}
.tf .tf-yw4l{vertical-align:top}
</style>
<?php
 
//SQL database connection info
include 'conn.php';

//Use prepared SQL statements to check database against users credentials entered
if ($stmt = $conn->prepare("SELECT * FROM `".$_SESSION["BasketID"]."`")) 
{
  //execute query
  $stmt->execute();
  //bind the result into variables
  $result = $stmt->get_result();        //Had to install GET RESULT as while statement wasn't working with fetch
  
  ?>
    <table class="tg">

    <?php
  $total = 0;
  while ($row = $result->fetch_assoc())
  {
    $result_b = $conn->prepare("SELECT * FROM products WHERE ID = '$row[Prod_ID]'");

    $result_b->execute();

    $result2 = $result_b->get_result();
    
      
      while ($row2 = $result2->fetch_assoc()) //For some reason only retrieving 1 result
      { 
        $total = $total + $row2["Price"];
        ?>
        <tr>
          <th class="tg-yw4l"><center><u><b>Image</b></u></center><img src="<?php print_r($row2["Image"]);  ?>"  height="100px" width="200px" alt="<?php print_r($row2["Prod_Name"]); ?>"></th>
          <th class="tg-yw4l"><center><u><b>Name</b></u></center><?php print_r($row2["Prod_Name"]);  ?></th>
          <th class="tg-yw4l"><center><u><b>Description</b></u></center><?php print_r($row2["Short_Desc"]);  ?></th>
          <th class="tg-yw4l"><center><u><b>Platform</b></u></center><img src="<?php print_r($row2["Platform"]);  ?>" height="50px" width="100px"></th>
          <th class="tg-yw4l"><center><u><b>Price</b></u></center>£<?php print_r($row2["Price"]);  ?></th>
          <th class="tg-yw4l"><center><?php echo '<a href="removeitem.php?ID=' . urlencode($row2["ID"]) .  '">'?><img src="assets/remove.png" alt="Remove item from Cart!" height="50px" width="50px"></a></center></th>
        </tr>
        <?php

      }
      
  }
  $stmt->close();
  ?>
  <tr>
  <th class="tf-yw4l" colspan="4"></th>
  <th class="tf-yw4l" colspan="2"><center><u><b>Total</b></u></center><?php print_r("<center>£".$total."</center>");  ?></th>
  </tr>
        </table>
      <?php
  
}

?>
  
  
  
