<?php
include_once '../Database/connect.php';
 //error_reporting();

 function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 if(isset($_POST['submit'])){

    $ID = $_POST["iID"];

    if (empty($_POST["iName"])) {
        echo "Item name is required";
      } 
      else {
        $iName = clean($_POST['iName']);
      }

      if (empty($_POST["sQuantity"])) {
         echo "Quantity is required";
      } 
      else {
        $iQuantity = clean($_POST['sQuantity']);
      }

      if (empty($_POST["tSold"])) {
        echo "Total Sales is required";
      } 
      else {
      $tSold = clean($_POST['tSold']);
      }

      if (empty($_POST["sMonth"])) {
        echo "Group is required";
      } 
      else {
        $sMonth = clean($_POST['sMonth']);
      }

      if (empty($_POST["gClass"])) {
        echo "Group is required";
      } 
      else {
        $gClass = clean($_POST['gClass']);
      }
   
   
    $sql = "UPDATE sales SET Sales_ID='$ID',Item_Name='$iName', Quantity_Sold='$iQuantity', Total_Sales='$tSold',Month='$sMonth',Group_Class='$gClass' WHERE Sales_ID='$ID'";

    $result = mysqli_query($conn,$sql);

    if($result == true){
        echo "Success!";
        header("Location: ../Sales/Sales.php");
    }
    else {
        die("Fail".$conn->error);
        header("Location: ../../inventory_add_new.html");
    }


 }