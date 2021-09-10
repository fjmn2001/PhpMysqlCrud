<?php

include ("db.php");

if (isset($_GET['id'])){

    $id= $_GET['id'];

    $stmt = Connection::conectar()->prepare("SELECT id, title, description, created_at FROM crud WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result=$stmt->fetch();

    if ($result==1){

        $title=$result;
    }



            echo "work";

    }