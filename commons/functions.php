<?php
    function database(){
        return new PDO("mysql:host=localhost;dbname=project1","root","Sqrtfl0@t01");
    }
    function SweetAlert2($icon,$message){
        echo "<script src='assets/sweetalert2/sweetalert2.js'></script>";
        echo "<link rel='stylesheet' href='assets/sweetalert2/sweetalert2.css'>";
        return "<script>Swal.fire({
  title: '$message',
  icon: '$icon'
})</script>";
    }
?>