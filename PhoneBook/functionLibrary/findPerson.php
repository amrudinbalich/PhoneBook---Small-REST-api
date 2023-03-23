<?php

// for POST

function find() {
    global $db;
    $searchQL  = "SELECT name,lastname,phoneNumber,state FROM phonebook.phonelist WHERE name = :name && lastname = :lastname";
    $find = $db->prepare($searchQL);
    $find->execute(["name" => $_POST['name'],"lastname" => $_POST['lastname']]);
    $fetch = $find->fetch(PDO::FETCH_OBJ);
    // returns false if it fetches nothing else returns a object
    return $fetch;
}

// for GET 

function findGet() {
    global $db;
    $searchQL  = "SELECT name,lastname,phoneNumber,state FROM phonebook.phonelist WHERE name = :name && lastname = :lastname";
    $find = $db->prepare($searchQL);
    $find->execute(["name" => $_GET['name'],"lastname" => $_GET['lastname']]);
    $fetch = $find->fetch(PDO::FETCH_OBJ);
    // returns false if it fetches nothing else returns a object
    return $fetch;
}

function insertInto() {
    global $db;
    $insertQL = "UPDATE phonebook.phonelist
    SET phoneNumber = :newPhoneNumber, state = :newState
    WHERE name = :name AND lastname = :lastname";
    $stmt = $db->prepare($insertQL);
    $stmt->execute(["name" => $_POST['name'],"lastname" => $_POST['lastname'],"newPhoneNumber" => $_POST['phoneNumber'],"newState" => $_POST['state']]);
    return $stmt;
}

?>