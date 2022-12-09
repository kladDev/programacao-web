<?php
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=suebanco', 'root', 'root');
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
