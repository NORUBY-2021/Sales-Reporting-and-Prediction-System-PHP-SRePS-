<?php
include_once '../Database/connect.php';
 //error_reporting();

 // Cleans data to make it harder for hackers to gain acces throught SQL injections.
 function clean($data) {
    $data = trim($data); // Removes whitespace.
    $data = stripslashes($data); // Removes '/' or '-'
    $data = htmlspecialchars($data); // Removes special characters.
    return $data;
 }

 if(isset($_POST['submit'])){

  // Error validators makesure all inputs are filled.
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
   
   
    $sql = "INSERT INTO inventory(Item_Name, Quantity_In, Unit_Price, Group_Class) VALUES ('$iName','$iQuantity','$uPrice','$gClass')";

    $result = mysqli_query($conn,$sql);

    // To makesure connection is successfull
    if($result == true){
        echo "Success!";
        header("Location: ../Inventory/inventory.php"); // If successfull then user is redirected to inventory page.
    }
    else {
        echo "Fail". $conn->error;
        //header("Location: ../../inventory_add_new.html");
    }


 }