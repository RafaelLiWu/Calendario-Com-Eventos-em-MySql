<meta charset="UTF-8">

<?php

function DiasMeses()
{
    $days = array();
    for ($i = 1; $i <= 12; $i++) {
        $days[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date("Y"));
    }

    return $days;
}

$mesAtual = filter_input(INPUT_POST, "mesAtual", FILTER_SANITIZE_NUMBER_INT);


$diasSemana = array(
    "Sun",
    "Mon",
    "Tue",
    "Wed",
    "Thu",
    "Fri",
    "Sat"
);

$meses = array(
    1 => "Janeiro",
    2 => "Fevereiro",
    3 => "Março",
    4 => "Abril",
    5 => "Maio",
    6 => "Junho",
    7 => "Julho",
    8 => "Agosto",
    9 => "Setembro",
    10 => "Outubro",
    11 => "Novembro",
    12 => "Dezembro"
);

$diasMeses = DiasMeses();
$calendar = array();

for ($i = 1; $i <= 12; $i++) {
    $calendar[$i] = array();
    for ($n = 1; $n <= $diasMeses[$i]; $n++) {
        $calendar[$i][$n] = jddayofweek(gregoriantojd($i, $n, date("Y")), 2);
    }
};

$mesAtualEscrito = $GLOBALS['meses'][$GLOBALS['mesAtual']];
$qtd = 0;
$str = '';
$str = "$str <div class='mesatual'>$mesAtualEscrito</div>";
foreach ($diasSemana as $dia) {
    $str = "$str <div class='diasblock'>$dia</div>";
};
foreach ($diasSemana as $dia) {

    if ($dia != $calendar[$mesAtual][1]) {
        $qtd++;
    } else {
        break;
    };
}
for ($i = 0; $i < $qtd; $i++) {
    $str = "$str <div class='diasnumber'></div>";
}
foreach ($calendar[$mesAtual] as $dia => $diaNome) {
    $str = "$str <div class='diasnumber' dia='".date('Y')."_{$mesAtual}_{$dia}'>$dia</div>";
};

echo $str;

?>