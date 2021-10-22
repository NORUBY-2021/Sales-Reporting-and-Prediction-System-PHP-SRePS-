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
      } else {
        $iName = clean($_POST['iName']);
      }

      if (empty($_POST["iQuantity"])) {
         echo "Quantity is required";
      } else {
        $iQuantity = clean($_POST['iQuantity']);
      }

      if (empty($_POST["uPrice"])) {
        echo "Unit Price is required";
      } else {
      $uPrice = clean($_POST['uPrice']);
      }

      if (empty($_POST["gClass"])) {
        echo "Group is required";
      } else {
        $gClass = clean($_POST['gClass']);
      }
   
   
    $sql = "UPDATE inventory SET ID='$ID',Item_Name='$iName', Quantity_In='$iQuantity',Unit_Price='$uPrice',Group_Class='$gClass' WHERE ID='$ID'";

    $result = mysqli_query($conn,$sql);

    if($result == true){
        echo "Success!";
        header("Location: ../Inventory/inventory.php");
    }
    else {
        echo "Fail";
        //header("Location: ../../inventory_add_new.html");
    }


 }