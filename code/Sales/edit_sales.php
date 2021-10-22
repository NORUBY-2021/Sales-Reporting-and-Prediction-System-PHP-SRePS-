<?php
include_once '../Database/connect.php';

    //Get id from the url.
    $editID = $_GET['editid'];
    $sql = "SELECT * FROM sales WHERE Sales_ID='$editID'"; // Select all from ID
    $result = mysqli_query($conn, $sql);
    
   
    //Intialize values from database to variables.
    while($row = mysqli_fetch_assoc($result)){
        $ID = $row['Sales_ID'];
        $iName =  $row['Item_Name'];
        $iQuantity = $row['Quantity_Sold'];
        $tSold = $row['Total_Sales'];
        $sMonth = $row['Month'];
        $gClass = $row['Group_Class'];

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="display-4"><img src="../Logo/logo.png" class="rounded " alt="logo" height= 70rem width=70em>People's Health Pharmacy</h1>
            </div>
        </nav>
          <div class="container">
             <!--Intentionally Empty-->
          </div>
        <form method="post" action="update_sales_process.php" >
        <div class="container">
          <h1 class="h1">Inventory:  <small class="text-muted">Updates</small></h1>
          <div class="mb-3">
              <input type="text" class="form-control" name="iID" value=<?php echo $ID ?> readonly>
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="iName" value=<?php echo $iName ?> >
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="sQuantity" value=<?php echo $iQuantity?>>
          </div>
          <div class="mb-3">
                <select name="sMonth" class="form-control">
                    <option value="<?php echo $sMonth?> "><?php echo $sMonth?></option>
                    <option value="Jan">January</option>
                    <option value="Feb">February</option>
                    <option value="Mar">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="Jul">July</option>
                    <option value="Aug">August</option>
                    <option value="Sept">September</option>
                    <option value="Oct">October</option>
                    <option value="Nov">November</option>
                    <option value="Dec">December</option>
                </select>
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="tSold" value=<?php echo $tSold ?> >
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="gClass" value=<?php echo $gClass?>>
          </div>
          <div class="mb-3">
              <input type="submit" class="btn btn-primary" name="submit" >
              <a href="sales.php" class="btn btn-danger float-end">Back to main page</a>
          </div>
        </div>
    </body>
</html>