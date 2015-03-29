<?php

include('_CONNECT/server-connect.php');

$name = 'Chris'; # user-supplied data

try {
    $conn = new PDO($dsn, $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $conn->query('SELECT * FROM employee WHERE firstName = ' . $conn->quote($name));

    foreach($data as $row) {
        print_r($row);
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}