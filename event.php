<?php

$req = filter_input(INPUT_GET, "req", FILTER_SANITIZE_NUMBER_INT);
try{
    if($req == 1){
    $dia = filter_input(INPUT_POST, "dia", FILTER_SANITIZE_STRING);
    $conect = new PDO("mysql:host=localhost;port=3306;dbname=calendario", "root", "");
    $result = $conect->prepare("SELECT * FROM eventos WHERE Horario = :d");
    $result->bindValue(
        "d", $dia
    );
    $result->execute();
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
    }
}catch (PDOException $e) {
    echo "Erro {$e->getMessage()}";
}

?>