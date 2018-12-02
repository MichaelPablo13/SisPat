<?php 
    include "conexao.php";

    // This is just an example of reading server side data and sending it to the client.
    // It reads a json formatted text file and outputs it.

    // $string = file_get_contents("dashboard_test.json");
    // echo $string;
    
    // Instead you can query your database and parse into JSON etc etc
    $query = "SELECT descricao, COUNT(idPeriferico) AS quantidade_periferico FROM periferico GROUP BY descricao";
    $qresult = mysqli_query($conexao, $query);
    $rows = array();
    $results = array();

    while ($res = mysqli_fetch_assoc($qresult)){
        $results[] = $res;
    }

    // print_r($results);

    $pie_chart_data = array();

    foreach($results as $result) {
        $pie_chart_data[] = array($result['descricao'], (int)$result['quantidade_periferico']);
    }
    
    // print_r($pie_chart_data);

    $json_pie_chart_data = json_encode($pie_chart_data);

    // print_r($pie_chart_data);

    // echo $json_pie_chart_data;

    mysqli_free_result($qresult);
?>