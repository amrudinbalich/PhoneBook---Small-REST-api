<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=phonebook","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Something went wrong : " . $e->getMessage();
}




?>