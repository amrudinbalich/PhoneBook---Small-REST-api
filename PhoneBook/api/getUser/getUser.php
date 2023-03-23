<?php


// get specific user 
// name and lastname needs to be passed inside url encoded parameter

require "../db/db.php";
require "../../functionLibrary/findPerson.php";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $issetArr = ["name","lastname"];
    foreach($issetArr as $element) {
        if(empty($_GET[$element])) {
            echo "$element is not set";
            exit;
        }
    }

    // everything is set 

    $find = findGet();
    if($find) {
    echo json_encode($find);
    } else {
        header("Content-Type:text/html");
        echo "Sorry but person under name ".$_GET['name']." ".$_GET['lastname']." does not exist in our database.";
    }
}

