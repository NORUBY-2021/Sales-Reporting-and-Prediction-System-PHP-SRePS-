<?php
    include_once '../Database/connect.php';
    $sql = "SELECT * FROM inventory";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
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
                <a href="../Main/Main.html" class="btn btn-dark mx-1" role="button">Return To Main</a>
            </div>
        </nav>
          <div class="container">
             <!--Intentionally Empty-->
          </div>
        <form action="add_sales.php" method="POST" >
        <div class="container">
          <h1 class="h1">Sales:  <small class="text-muted">New Sale</small></h1>
          <div class="mb-3">
          <select name="sIName" class="form-control">
                <option value=" ">Select Item</option>
              <?php
                    if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['Item_Name']."'>".$row['Item_Name']."</option>";
                    }
                }
              ?>
              </select>
            </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="sQuantity" placeholder="Quantity Bought">
          </div>
          <div class="mb-3">
                <select name="sMonth" class="form-control">
                    <option value=" ">Select Month Of Sale</option>
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
              <input type="submit" class="btn btn-primary" name="submit" >
              <a href="../Inventory/inventory.php" class="btn btn-secondary mx-1">Display Inventory</a>
              <a href="sales.php" class="btn btn-danger float-end">Return</a>
          </div>
        </div>
    </body>
</html>