<?php
  include("navbar.php");
?>

<body>

<div class="container-fluid">

<h2>Bestellingen</h2>

<?php

try {
    $conn = new PDO("mysql:host=127.0.0.1:8889;dbname=webshopdb", 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->query("SELECT * FROM bestellingen");
	while ($row = $stmt->fetch()) {
    echo "<LI>" . $row['id'] . " - ";
    echo $row['email'] . " - ";
    echo $row['productid'] . " - ";
    echo $row['tebetalen'] . " - ";
    echo "</LI>";
	}	
		
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;		
	
?>

</div>

</body>