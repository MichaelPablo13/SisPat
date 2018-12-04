<?php
//index.php
$query = 'SELECT DISTINCT fim_de_aluguel, COUNT(*) as contagem_computador 
          FROM `computador` 
          GROUP BY fim_de_aluguel 
          ORDER BY contagem_computador DESC';

    $qresult = mysqli_query($conexao, $query);
    $results = array();

    while ($res = mysqli_fetch_assoc($qresult)){
        $results[] = $res;
    }

    //print_r($results);

    $line_chart_data = array();

    foreach($results as $result) {
        $line_chart_data[] = array($result['fim_de_aluguel'], (int)$result['contagem_computador']);
    }
    
    $json_line_chart = json_encode($line_chart_data);

    // print_r($bar_chart_data);

    echo $json_line_chart;

    mysqli_free_result($qresult);
?>