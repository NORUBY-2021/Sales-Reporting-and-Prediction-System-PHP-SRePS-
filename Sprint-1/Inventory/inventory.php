<?php
    include_once '../Database/connect.php'; //Connection to database.
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="display-4"><img src="../Logo/logo.png" class="rounded " alt="logo" height= 70rem width=70em>People's Health Pharmacy: Inventory</h1>
            </div>
        </nav>
        <br/>
          <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control mr-7"  id="iInput" placeholder="Search.....">
                <div class="btn-group mx-3"> 
                    <a href="../Main/Main.html" class="btn btn-secondary mx-1" role="button">Main</a>
                    <a href="../Sales/sales.php" class="btn btn-secondary mx-1">Sales</a>
                    <a href="inventory_add_new.html" class="btn btn-secondary mx-1">Add New</a>
                </div>
            </div>
            <div class="container">
            <table class= "table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Quantity In Stock</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Group</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>     
            <?php
                    $sql = "SELECT * FROM inventory"; //Sql query to return all from the table.
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    // Dynamically creating the table.
                    if($resultCheck > 0){ //Makesure there is data in the database before creating the table.
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['ID'];
                            echo "<tbody class=\"tbody-light\">";
                                echo "<tr>";
                                    echo  "<td>".$row['ID']."</td>";
                                    echo  "<td>".$row['Item_Name']."</td>";
                                    echo  "<td>".$row['Quantity_In']."</td>";
                                    echo  "<td>".$row['Unit_Price']."</td>";
                                    echo  "<td>".$row['Group_Class']."</td>";
                                    echo  '<td><a href="edit_inventory.php?editid='.$id.'" class="btn btn-primary">Update</a><span> </span><a href="delete_inventory.php?deleteid='.$id.'" class="btn btn-danger">Delete</a></td>';
                                echo "</tr>";
                            echo "</tbody>";
                            
                        }
                    }
                ?>

            <table>
             </div>
          </div>
    </body>
</html>