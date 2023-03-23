<?php


function getAll() {
    global $db;
    $sql = "SELECT ID,name,lastname,phoneNumber,state FROM phonebook.phonelist";
    $select = $db->prepare($sql);
    $select->execute();
    $fetchAll = $select->fetchAll(PDO::FETCH_ASSOC);
    return $fetchAll;
}