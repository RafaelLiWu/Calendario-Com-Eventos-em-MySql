<?php

$Nome = filter_input(INPUT_POST, "Nome", FILTER_SANITIZE_STRING);
$Data = filter_input(INPUT_POST, "Data", FILTER_SANITIZE_STRING);
$Descricao = filter_input(INPUT_POST, "Descricao", FILTER_SANITIZE_STRING);

$conect = new PDO("mysql:host=localhost;port=3306;dbname=calendario", "root", "");
$request = $conect->prepare("INSERT INTO eventos (Horario, Nome, Descricao) VALUES (:da, :n, :de)");
$request->bindValue(
    "n", $Nome
);
$request->bindValue(
    "da", $Data
);
$request->bindValue(
    "de", $Descricao
);
$request->execute();
