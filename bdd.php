<?php

/**
 * CONNECTION A LA BDD
 */ 
function connect(){
    $conn = new PDO("mysql:host=localhost;dbname=code_snippet", "root", "");
    return $conn;
}

$conn = connect();
