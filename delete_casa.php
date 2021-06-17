<?php 

include ('server.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM casa WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Task Removed Succesfully';
    $_SESSION['message_type'] = 'danger';
    header("Location: edit.php");
}

?>