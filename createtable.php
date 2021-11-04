<?php
$conect = new PDO("mysql:host=localhost;port=3306;dbname=calendario", "root", "");
$query = $conect->prepare("CREATE TABLE eventos (Horario VARCHAR(25) NOT NULL, Nome VARCHAR(40) NOT NULL, Descricao TEXT, event_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL)");    
$query->execute();
header("Location: index.php");