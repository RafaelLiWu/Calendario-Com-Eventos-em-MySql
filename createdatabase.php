<?php
$conect = new PDO("mysql:host=localhost;port=3306;dbname=", "root", "");
$query = $conect->prepare("CREATE DATABASE calendario");    
$query->execute();
header("Location: createtable.php");