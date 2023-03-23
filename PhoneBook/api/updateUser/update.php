<?php

// user can update only phoneNumber and state in this API


// update user from a phoneBook
// user can 
// including db and function library

require "../db/db.php";
require "../../functionLibrary/findPerson.php";
require "../../functionLibrary/checkIsset.php";

if($_SERVER["REQUEST_METHOD"] == "PUT") {
    
    // getting raw input stream and parsing it into the $_POST superglobal array 
    // becuase the request is PUT I must do it this way in order to get the data from the $_POST
    parse_str(file_get_contents("php://input"), $_POST);
    $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : "";
    $state = isset($_POST["state"]) ? $_POST["state"] : "";
    // check did user filled a name and lastname or not
    if(!isset($_POST['name'],$_POST['lastname'])) {
        echo "Please specifiy a person in order to modifiy it.";
    } 
    // find person with specified name and lastname
    $find = find();
    if(!$find) {
        echo $_POST['name'] . " " . $_POST['lastname'] . " does not exist in our database.";
        exit;
    }
    $insertQL = insertInto();
    if($insertQL) {
        echo $_POST['name'] . " " . $_POST['lastname'] . " is successfully updated.";
    } else {
        echo "Response from server : Something went wrong."; 
    }




    // in order to update user in database user needs to provide us with name and lastname of a person that he tries to update
    

}







?>