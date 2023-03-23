<?php

// get all users

require("../db/db.php");
require("../../functionLibrary/getAll.php");


if($_SERVER["REQUEST_METHOD"] == "GET") {
    // calling a function to get all users
    // and converting native PHP object to a JSON
    $all = getAll();
    echo json_encode($all);

}



?>