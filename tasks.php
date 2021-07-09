<?php

include_once 'config.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    throw new Exception("Cannot connect to database");
}
else{

$action = $_POST['action'];
if(!$action){
    header('location:index.php');
    return;
}
else{
    if($action == 'add'){
        $task = $_POST['task'];
        $date = $_POST['date'];
        if($task && $date){
            $query = "insert into tasks(task,date) values('$task','$date')";
            $res = mysqli_query($connection, $query);
            if($res){
                header('location:index.php?added=true');
            }
            else{
                echo "false";
            }
        }

    }
} }

?>

