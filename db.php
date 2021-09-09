<?php

class Conexion{

    public static function  conectar(){

        $dsn = "mysql:host=crud_mysql:3306;dbname=crud";

        $link = new PDO($dsn,'root', 'medine03.');
        return $link;
    }
}
