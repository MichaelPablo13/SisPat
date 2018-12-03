<?php 
    include "conexao.php";

    // This is just an example of reading server side data and sending it to the client.
    // It reads a json formatted text file and outputs it.

    // $string = file_get_contents("dashboard_test.json");
    // echo $string;
    
    // Instead you can query your database and parse into JSON etc etc
    $query = "select status, count(status) as contagem_status from agendar group by status";
    $qresult = mysqli_query($conexao, $query);
    $results = array();

    while ($res = mysqli_fetch_assoc($qresult)){
        $results[] = $res;
    }

    //print_r($results);

    $bar_chart_data = array();

    foreach($results as $result) {
        $bar_chart_data[] = array($result['status'], (int)$result['contagem_status']);
    }
    
    $json_bar_chart_data = json_encode($bar_chart_data);

    // print_r($bar_chart_data);

    echo $json_bar_chart_data;

    mysqli_free_result($qresult);
?>