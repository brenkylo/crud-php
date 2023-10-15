<?php

define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "bren");
define("DB_PASSWORD", "1234");
define("DB_NAME", "crud_php");

#PDO
#Error Handling
try { # attempt a block of code that might throw exceptions.
    $pdo = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//for fetching mode
    echo "";
} catch (PDOException $e) {
    die ("Connection failed: " . $e->getMessage());
}
?>





