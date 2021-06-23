<?php

$dns = 'mysql:host=localhost;dbname=portfolio';
$pdo = new PDO($dns, 'root', '');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$this->conn = $pdo;
