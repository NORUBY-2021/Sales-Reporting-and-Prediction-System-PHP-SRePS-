<?php
include_once '../Database/connect.php';

if(isset($_GET['deleteid'])){
    $deleteID = $_GET['deleteid'];// Gets the ID from the url.

    $sql = "DELETE FROM `sales` WHERE Sales_ID='$deleteID'"; //Delete function
    $result = mysqli_query($conn,$sql);

     //Checks the connection to the database.
    if($result == true){
        header("Location: ../Sales/sales.php");
    }
    else {
        echo "Fail".$conn->error;
        //header("Location: ../Frontend/sales_new.html");
    }
}