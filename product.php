
<?php include('navbar.php'); ?>

<body>
    <div class="wrapper21">

       
        <h2 class="productlist-title">Fresh Fruit</h2>
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
    while ($row = $stmt->fetch()) {
                //en het weergeven als pagina naar gebruiker als HTML
                echo '<li>' . $row['naam'] . '  € ' . $row['prijs'] . "<BR>";
                echo '<a class="btn-update" href="koopproduct.php?productid=' . $row['id'] . '">Koop </a>';
                echo '<a class="btn-update" href="productbewerken.php?productid=' . $row['id'] . '">Wijzig </a>';
                echo '<a class="btn-delete" href="dbproductverwijderen.php?productid=' . $row['id'] . '">Verwijder </a>';
                echo '</li>';
            }
}

catch(PDOExeption $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$conn = NULL;

?>
        </div>
        <div class="filterbox">
            <form>
                <input type="text" name="naamfilter" placeholder="Fruitsoorten...">
                <button class="btn-search" type="submit" value="filter">Search</button>
                <button class="btn-search" type="submit" value="">Clear Search</button>
            </form>
        </div>
        
        <div class="wrapper3">
          <hr>

        <?php include("dbbestellingen.php"); ?>
        
    </div>
</body>


