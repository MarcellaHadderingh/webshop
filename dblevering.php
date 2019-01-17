<?php

$naam = $_POST['naam'];
$adres= $_POST['adres'];
$huisnr =$_POST['huisnr'];
$postcode = $_POST['postcode'];
$plaats = $_POST['plaats'];
$telefoon = $_POST['telefoon'];
$email = $_POST['email'];



try {
    $conn = new PDO("mysql:host=127.0.0.1:8889;dbname=webshopdb", 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare('INSERT INTO levering (naam, adres, huisnr, postcode, plaats, telefoon, email)
     VALUES (:fnaam, :fadres, :fhuisnr, :fpostcode, :fplaats, :ftelefoon, :femail)');

    $statement->execute([
    'fnaam' => $naam,
    'fadres' => $adres,
    'fhuisnr' => $huisnr,
    'fpostcode' => $postcode,
    'fplaats' => $plaats,
    'ftelefoon' => $telefoon,
    'femail' => $email,
    ]);
	
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
	
$conn = NULL;

header("Location: bestellen.php");


?>