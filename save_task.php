<?php

include("db.php");

if (isset($_POST['save_task'])) {
    $title= $_POST['title'];
    $description= $_POST['description'];


    $stmt = Connection::conectar()->prepare("INSERT INTO crud (title, description) VALUES (:title, :description)");

    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":description",$description);

    $stmt->execute();

    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}


