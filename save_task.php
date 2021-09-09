<?php

include("db.php");

if (isset($_POST['save_task'])) {
    $title= $_POST['title'];
    $description= $_POST['description'];


    $stmt = Conexion::conectar()->prepare("INSERT INTO crud (title, description) VALUES (:title, :description)");

    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":description",$description);

    if ($stmt->execute()){

        return "success";

    }

    else{

        return "error";
    }

}
