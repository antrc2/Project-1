<?php
    function database(){
        return new PDO("mysql:host=localhost;dbname=project1","root","");
    }
?>