<?php

include_once "conexao.php";
$result_events = "SELECT id, title, nome_recurso, responsavel_ti, color, start, end FROM events";
$resultado_events = mysqli_query($conexao, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $nome_recurso = $row_events['nome_recurso'];
    $responsavel_ti = $row_events['responsavel_ti'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];

    $eventos[] = array('id' => $id, 'title' => $title, 'nome_recurso' => $nome_recurso, 'responsavel_ti' => $responsavel_ti, 'color' => $color, 'start' => $start, 'end' => $end);
}

echo json_encode($eventos);
//print_r($datas);

