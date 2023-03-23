<?php

// function that loops over an array and checks are all array keys in the $POST variable as they should be
// oterwise if something is missing in there POST or PUT api request wont be made
// if there is any info that is not being passed by a user program will terminate with a message indicating what user didnt filled

function checkIsset() {
    $required_params = ["name","lastname","phoneNumber","state"];
    foreach($required_params as $param) {
        if(empty($_POST["$param"])) {
            header("Content-Type:UTF-8");
            echo "$param is not set";
            exit;
        }
    }
}