
<?php include('navbar.php'); ?>

<body>
    <div class="wrapper31">

       
        <h2 class="productlist-title">Fresh Fruit</h2>
        <h4 class="productlist-title">Bestel hier je verse Fruit.</h4>
        <div class="filterbox">
            <form>
                <input type="text" name="naamfilter" placeholder="Fruitsoorten...">
                <button class="btn-search" type="submit" value="filter">Search</button>
                <button class="btn-search" type="submit" value="">Clear Search</button>
            </form>
        </div>
        <div class="productlist">
        <?php

if (isset($_GET['naamfilter'])){
    $naamfilter = $_GET['naamfilter'];
}
else {
    $naamfilter = '';
}


try {
    $conn = new PDO('mysql:host=127.0.0.1:8889;dbname=webshopdb', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM producten WHERE naam LIKE '%$naamfilter%' ");
    echo '<table class="table table-striped" id= "table">
    <thead></thead>
     <tr>
    <th>Product</th>
    <th>Prijs</th>
    </tr>
    </thead>
    <tbody>';
    while ($row = $stmt->fetch()) {
                //en het weergeven als pagina naar gebruiker als HTML
        
                echo '<tr>';
                echo '<td>' . $row['naam'] . '</td>' . '<td>' . '  € ' . $row['prijs'] . "</td>";
                echo '<td><a class="btn-update" href="koopproduct.php?productid=' . $row['id'] . '"><i class="fas fa-shopping-cart"></i></a></td>';
                echo '<td><a class="btn-update" href="productbewerken.php?productid=' . $row['id'] . '"><i class="far fa-edit"></i> </a></td>';
                echo '<td><a class="btn-delete" href="dbproductverwijderen.php?productid=' . $row['id'] . '"><i class="far fa-trash-alt"></i> </a></td>';
                echo  '</tr>';
             }
          echo  '</tbody>
              </table>';
}

catch(PDOExeption $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$conn = NULL;

?>
        </div>
        <div class="product">
        <button class="btn-search" type="submit" value=""><a href="producttoevoegen.php">Product Toevoegen</a></button>
        </div>
        
    </div>
</body>


