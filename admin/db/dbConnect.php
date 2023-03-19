<?php


try {
    $host = 'localhost';
    $db_name='c10mkb';
    $charset ='utf8';
    $username = 'c10Mariam';
    $password = 'K1l16611@#';
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset",$username,$password);
    
} catch (PDOException $e) {
    
    echo 'Veri tabanı bağlantı hatası: '.$e;

}
?>