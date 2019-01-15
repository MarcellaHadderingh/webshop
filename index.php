<?php
  include("navbar.php");
?>

<body>

<div class="container-fluid">

<h2>Productenlijst</h2>

<form class="bs-component">
 
  <div class="input-group">
 
  <input class="form-control" name="naamfilter" placeholder="Naam bevat..." style="max-width:280px">
  <input class="btn btn-warning" type="submit" value="Filter">
  <a href="producttoevoegen.html" class="btn btn-info">Product toevoegen</a>

  </div><!-- /input-group -->

 </form>

<?php

if (isset($_GET['naamfilter']))
 {
   $naamfilter = $_GET['naamfilter'];
 }
else
  {
	  $naamfilter = '';
  }
try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->query("SELECT * FROM producten WHERE naam LIKE '%$naamfilter%'");
  echo "<table border=0 cellpadding=5>";
	while ($row = $stmt->fetch()) {
    echo "<tr>"; 
    echo "<td>" . $row['naam'] . "</td><td>" . $row['prijs'] . "</td>";
		echo "<td><a class='btn btn-danger btn-sm' href='dbproductverwijderen.php?productid=" . $row['id'] . "'>Verwijder</a></td> ";
    echo "<td><a href='productbewerken.php?productid=" . $row['id'] . "'><button type='button' class='btn btn-primary  btn-sm'>Wijzigen</button></a></td>";
    echo "<td><a href='koopproduct.php?productid=" . $row['id'] . "'><button type='button' class='btn btn-success  btn-sm'>Kopen</button></a></td>";
    
		echo "</tr>";
  }	
  echo "</table>";
		
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;		
	
?>

</div>

</body>