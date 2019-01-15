<?php
    include_once("dblib.php");

    $productid = $_GET['productid'];
    $productnaam = dblookup("producten", "naam", $productid);
    $productprijs = dblookup("producten", "prijs", $productid);

?>

<form action="dbproductupdate.php" method="POST">

    <input name="productid" placeholder="Product id" value="<?php echo $productid ?>">
    <input name="productnaam" placeholder="Product naam" value="<?php echo $productnaam ?>">
    <input name="productprijs" placeholder="Product prijs" value="<?php echo $productprijs ?>"> 
    <button type="submit">Update</button>

</form>

