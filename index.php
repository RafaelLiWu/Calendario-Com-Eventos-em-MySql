<meta charset="UTF-8">

<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="Calendario">
        <div class="dias date">
        </div>
    </div>
    <div class="dias new">
        <div class="mesanterior">
            < </div>
                <div class="mesposterior">
                    >
                </div>
        </div>
    </div>


    <form>
        <div class="dividir">
        <label for="Horario">Data</label>
        <input type="text" id="Horario">
        <small>Ex: 2021/12/30, 2021/10/3, 2021/3/3</small>
        </div>
        <div class="dividir">
        <label for="Nome">Nome</label>
        <input type="text" id="Nome">
        <small>Ex: Festa, Atualização, Eventos</small>
        </div>
        <div class="dividir">
        <label for="Descricao">Descricao</label>
        <input type="text" id="Descricao">
        <small>Ex: Festa de aniversário, Atualização do Sistema.</small>
        </div>
        <input type="submit" value="Enviar" onclick="formulario(this, event)" style="margin-top: 10px">


    </form>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="ajax.js"></script>
</body>

</html>