<?php

include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    throw new Exception("Cannot connect to database");
} else {
    echo "Connected";
    // $query = "INSERT INTO tasks(task,date,complete) VALUES ('Dream More, DO more', '2021-7-8', '2')";
    $query = "select * from tasks";
    $res = mysqli_query($connection, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        echo "<pre>";
        print_r($data);
    }
    // $data = mysqli_fetch_assoc($res);
    // print_r($data);
    exit;
    $res = mysqli_query($connection, $query);
    if ($res) {
        echo "done";
    } else {
        echo "no";
    }
    mysqli_close($connection);
}
