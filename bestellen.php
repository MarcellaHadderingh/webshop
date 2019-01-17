<?php include('navbar.php'); ?>
<body>
    <div class="wrapper21">
        <h1 class="productlist-title" >Bestellen</h1>
            <div class="updateform">
                <form action="dblevering.php" method="POST">
                <input type="text" name="naam" placeholder="Naam...">
                <br>
                <input type="text" name="adres" placeholder="Adres...">
                <input type="text" name="huisnr" placeholder="Huisnummer + Toevoeging ...">
                <input type="text" name="postcode" placeholder="Postcode...">
                <input type="text" name="plaats" placeholder="Plaats...">
                <br>
                <input type="number" name="telefoon" placeholder="Telefoon...">
                <input type="text" name="email" placeholder="E-mail...">
                <br><br>
                <button class="btn-update" type="submit">Bestel</button>
                </form>
            </div>
    </div>
</body>
</html>