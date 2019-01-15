<?php

$productid = $_POST['productid'];
$productnaam = $_POST['productnaam'];
$productprijs = $_POST['productprijs'];

try {
    $conn = new PDO('mysql:host=127.0.0.1:8889;dbname=webshopdb', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('UPDATE producten SET naam=:fnaam, prijs=:fprijs WHERE id=:fproductid');

    $stmt->execute([
        'fproductid' => $productid,
        'fnaam' => $productnaam,
        'fprijs' => $productprijs
    ]);
}

catch(PDOExeption $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$conn = NULL;

header ('Location: index.php' );

?>