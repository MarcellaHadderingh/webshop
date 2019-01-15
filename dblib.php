<?php

function dblookup($tablename, $field, $filtervalue)
{
    $result = null;

    try {
        $conn = new PDO("mysql:host=localhost;dbname=webshopdb", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // let op: dit nog herschrijven als prepared statement
        $statement = $conn->prepare("SELECT * FROM $tablename WHERE id = :ffiltervalue");

        $statement->execute([
         'ffiltervalue' => $filtervalue
         ]);
         
        while ($row = $statement->fetch()) {
            $result = $row[$field];
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $conn = null;
    return $result;
}	


//echo dblookup("producten", "prijs", 10);

?>
