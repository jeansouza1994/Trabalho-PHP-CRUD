<?php

class Banco {

    private $bd;

    function __construct()
    {
        
        try {
            $this->bd = new PDO('pgsql:host=localhost;dbname=aula_tecweb;port=5432',
             'postgres', 'admlinux');
         }catch (Exception $e ) {
            var_dump($e->getMessage());
            die();
         }  
    }

    function query($sql) {
       return $this->bd->query($sql);
    }

    function exec($sql) {
        return $this->bd->exec($sql);
     }

}


?>