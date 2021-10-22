<?php
include_once 'connect.php';
 //error_reporting();

 function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 if(isset($_POST['submit'])){

    if (empty($_POST["sIName"])) {
        echo "Item name is required";
      } else {
        $iName = clean($_POST['sIName']);
      }

      if (empty($_POST["sQuantity"])) {
         echo "Quantity is required";
      } else {
        $iQuantity = clean($_POST['sQuantity']);
      }

      if (empty($_POST["sUPrice"])) {
        echo "Unit Price is required";
      } else {
      $uPrice = clean($_POST['sUPrice']);
      }

      if (empty($_POST["sGClass"])) {
        echo "Group is required";
      } else {
        $gClass = clean($_POST['sGClass']);
      }

      if (empty($_POST["sMonth"])) {
        echo "Group is required";
      } else {
        $sMonth = clean($_POST['sMonth']);
      }
   
   
    $sql = "INSERT INTO sales(Item_Name, Quantity_Sold, Total_Sales, Month, Group_Class) VALUES ('$iName','$iQuantity', '$uPrice', '$sMonth','$gClass')";

    $result = mysqli_query($conn,$sql);

    if($result == true){
        echo "Success!";
        header("Location: ../Frontend/sales.php");
    }
    else {
        echo "Fail".$conn->error;
        //header("Location: ../Frontend/sales_new.html");
    }


 }