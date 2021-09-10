<?php

include ("db.php");

if (isset($_GET['id'])){

    $id= $_GET['id'];

    $stmt = Connection::conectar()->prepare("DELETE FROM crud WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $_SESSION['message'] = 'Task Remove Succesfully';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}