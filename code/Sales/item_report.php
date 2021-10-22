<?php
    include_once '../Database/connect.php';
    $sMonth = " "; // Month variable should be empty intially to avoid errors
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="display-4"><img src="../Logo/logo.png" class="rounded " alt="logo" height= 70rem width=70em>People's Health Pharmacy: Sales Predictions</h1>
            </div>
        </nav>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
        <div class="mb-3">
            <div class ="row">
                <div class="col">
                    <select name="sMonth" class="form-control">
                        <option value=" ">Select Month For Report</option>
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
                <div class="col">
                    <input type="submit" class="btn btn-primary" name="submit" >
                    <a href="../Main/Main.html" class="btn btn-dark mx-5" role="button">Return To Main</a>
                    <a href="sales.php" class="btn btn-secondary mx-1" role="button">Sales</a>
                    <a href="group_report.php" class="btn btn-secondary mx-1" role="button">Group Report</a>
                </div>
            </div>
          </div>
         
        </form>
        <div class="container">
            <table class= "table">
                <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity Sold</th>
                    <th scope="col">Total Sale (RM)</th>
                </tr>
                <?php
                if(isset($_POST['submit'])){

                    if (empty($_POST["sMonth"])) {
                        echo "Month is required";
                    } else {
                        $sMonth = $_POST['sMonth'];
                    }

                    //Use SQL function SUM() to get the total sales and quantity sold by grouping them with the Items Name
                    $sql = "SELECT Item_Name, SUM(Quantity_Sold) AS Quant,  ROUND(SUM(Total_Sales),2) AS Sales FROM sales WHERE Month ='$sMonth' GROUP BY Item_Name ORDER BY  SUM(Quantity_Sold) DESC;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo  "<td>".$row['Item_Name']."</td>";
                                echo  "<td>".$row['Quant']."</td>";
                                echo  "<td> RM".$row['Sales']."</td>";
                            echo "</tr>"; 
                        }
                    }
                }
                ?>
            <table>
                <?php
                $bestV = "SELECT Item_Name, SUM(Quantity_Sold) AS Quant,  ROUND(SUM(Total_Sales),2) AS Sales FROM sales WHERE Month ='$sMonth' GROUP BY Item_Name ORDER BY SUM(Quantity_Sold)  DESC LIMIT 1;"; // This only returns the largest quantity sold.
                $resultb = mysqli_query($conn, $bestV);
                $worstV = "SELECT Item_Name, SUM(Quantity_Sold) AS Quant,  ROUND(SUM(Total_Sales),2) AS Sales FROM sales WHERE Month ='$sMonth' GROUP BY Item_Name ORDER BY SUM(Quantity_Sold) ASC LIMIT 1;"; // This returns the smallest quantity sold.
                $resultc = mysqli_query($conn, $worstV);
                ?>
                <div class="container">
                    <details>
                        <h4>Customer Trends</h4>
                        <?php
                            $row = mysqli_fetch_assoc($resultb);
                            echo "<h5> Best Value Item : ".$row['Item_Name']."</h5>";
                            echo "<details>";
                                echo "<summary> Description</summary>";
                                echo "<p>".$row['Item_Name']." is predicted to do well in the following months based on customer buying trends with the highest quantity of item sold at ".$row['Quant']." units and a total sale value of RM ".$row['Sales'].". There is high demand for this item plus it has a high sale value. <br/> Thus market more and increase inventory for this item as it will increase profits. </p>";
                            echo "</details>";
                        ?>
                        <?php
                            $rows = mysqli_fetch_assoc($resultc);
                            echo "<h5> Worst Value Item : ".$rows['Item_Name']."</h5>";
                            echo "<details>";
                                echo "<summary> Description</summary>";
                                echo "<p>".$rows['Item_Name']." is predicted to do badly in the following month based on customer buying trends with a quantity of item sold at ".$rows['Quant']." units as well as total sale value of RM ".$rows['Sales'].". It has the lowest demand this month as well as lowest sales.<br/> Consider reducing inventory of this item or removing it as it does not profit the business. </p>";
                            echo "</details>";
                        ?>
                    </details>
                </div>
        </div>
    </body>
</html>