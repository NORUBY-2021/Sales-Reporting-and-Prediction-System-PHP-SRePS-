<?php
include_once '../Database/connect.php';
error_reporting(E_ALL);


// Cleans data to make it harder for hackers to gain acces throught SQL injections.
function clean($data) {
  $data = trim($data); // Removes whitespace.
  $data = stripslashes($data); // Removes '/' or '-'
  $data = htmlspecialchars($data); // Removes special characters.
  return $data;
}

// Error validators makesure all inputs are filled
 if(isset($_POST['submit'])){

  $iName = $_POST['sIName'];
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


      if (empty($_POST["sMonth"])) {
        echo "Group is required";
      } else {
        $sMonth = clean($_POST['sMonth']);
      }
   
    //$Total = $uPrice * $iQuantity;

    // To auto get attributes of the item.
    $queryS = "SELECT * FROM inventory WHERE Item_Name = '$iName'"; 
    $saleQ =  mysqli_query($conn,$queryS);
    $sales = mysqli_fetch_assoc($saleQ);

    // To auto calculate the total price of the item
    $Total = $sales['Unit_Price'] * $iQuantity;
    $gClass = $sales['Group_Class'];

    // Updates the inventory table with new Quantity value after subtracting the quantity sold.
    $query = "UPDATE inventory SET Quantity_In= Quantity_In -'$iQuantity' WHERE Item_Name ='$iName'";

    //Inserts new values to sales table.
    $sql = "INSERT INTO sales(Item_Name, Quantity_Sold, Total_Sales, Month, Group_Class) VALUES ('$iName','$iQuantity', '$Total', '$sMonth','$gClass')";

    $results = mysqli_query($conn,$query);
    $result = mysqli_query($conn,$sql);
    
    // To makesure connection is successfull
    if($result == true){
        echo "Success!";
        header("Location: ../Sales/sales.php"); // If successfull then user is redirected to sales page.
    }
    else {
        echo "Fail".$conn->error; // Returns error messages.
        //header("Location: ../Frontend/sales_new.html");
    }


 }