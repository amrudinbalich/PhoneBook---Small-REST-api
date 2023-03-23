<?php

function findNum () {
    global $db;
    $phoneQL = "SELECT phoneNumber FROM phonebook.phonelist WHERE phoneNumber = :phone";
    $findPhone = $db->prepare($phoneQL);
    $findPhone->execute(["phone" => $_POST['phoneNumber']]);
    $number = $findPhone->fetch(PDO::FETCH_OBJ);
    // returns false if it fetches nothing else returns a object
    return $number;
}



?>