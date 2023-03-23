<?php

// INCLUDE DB AND ASSET FILES

require("../db/db.php");
require("../../functionLibrary/findPerson.php");
require("../../functionLibrary/findNumber.php");
require("../../functionLibrary/checkIsset.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // code to be executed if the request method is POST
    // check if some request parameter is not set
    checkIsset();
    // pevent creating duplicates in db - calls function from library
    $fetch = find();
    if($fetch) {
        header("Content-Type:text/html");
        echo "User $fetch->name $fetch->lastname already exists in db.";
        exit;
    }

    // check specifically for a phone number - calls function from library
    $number = findNum();
    if($number) {
        echo "$number->phoneNumber is already taken";
        exit;
    }

    // if everything is correct and test is passed , insert info inside DB
    $sql = "INSERT INTO phonebook.phonelist (name,lastname,phoneNumber,state) VALUES (:name,:lastname,:phoneNumber,:state)";
    $stmt = $db->prepare($sql);
    $stmt->execute(["name" => $_POST['name'],"lastname" => $_POST['lastname'],"phoneNumber" => $_POST['phoneNumber'],"state" => $_POST['state']]);
    header("Content-Type:text/html");
    echo "New user created in db .";
}