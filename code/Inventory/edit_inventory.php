<?php
include_once '../Database/connect.php';

    //Get id from the url.
    $editID = $_GET['editid'];
    $sql = "SELECT * FROM inventory WHERE ID='$editID'";// Select all from ID
    $result = mysqli_query($conn, $sql);
    
   
    //Intialize values from database to variables.
    while($row = mysqli_fetch_assoc($result)){
        $ID = $row['ID'];
        $iName =  $row['Item_Name'];
        $iQuantity = $row['Quantity_In'];
        $uPrice = $row['Unit_Price'];
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
        <form method="post" action="update_process.php" >
        <div class="container">
          <h1 class="h1">Inventory:  <small class="text-muted">Updates</small></h1>
          <div class="mb-3">
              <input type="text" class="form-control" name="iID" value=<?php echo $ID ?> readonly>
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="iName" value="<?php echo $iName ?>" >
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="iQuantity" value=<?php echo $iQuantity?>>
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="uPrice" value=<?php echo $uPrice ?> >
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="gClass" value=<?php echo $gClass?>>
          </div>
          <div class="mb-3">
              <input type="submit" class="btn btn-primary" name="submit" >
              <a href="main.html" class="btn btn-danger float-end">Back to main page</a>
          </div>
        </div>
    </body>
</html>