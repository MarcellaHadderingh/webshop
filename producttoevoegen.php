<?php include('navbar.php'); ?>
<body>
    <div class="wrapper1">
        <h1 class="productlist-title" >Product toevoegen</h1>
            <div class="updateform">
                <form action="dbproducttoevoegen.php" method="POST">
                <input type="text" name="productnaam" placeholder="Product naam">
                <input type="text" name="productprijs" placeholder="Product prijs">
                <button class="btn-update" type="submit">Voeg product toe</button>
                </form>
            </div>
    </div>
</body>
</html>