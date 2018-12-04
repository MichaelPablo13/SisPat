<?php 
    include "conexao.php";

    // This is just an example of reading server side data and sending it to the client.
    // It reads a json formatted text file and outputs it.

    // $string = file_get_contents("dashboard_test.json");
    // echo $string;
    
    // Instead you can query your database and parse into JSON etc etc
    //Umbiguity: For status of computers
    $query = "SELECT DISTINCT departamento, COUNT(nome) as contagem_departmento FROM usuarios group by departamento order by contagem_departmento DESC";
    $qresult = mysqli_query($conexao, $query);
    $results = array();

    while ($res = mysqli_fetch_assoc($qresult)){
        $results[] = $res;
    }

    //print_r($results);

    $bar_chart_data = array();

    foreach($results as $result) {
        $bar_chart_data[] = array($result['departamento'], (int)$result['contagem_departmento']);
    }
    
    $json_bar_chart_data_usuario = json_encode($bar_chart_data);

    // print_r($bar_chart_data);

    echo $json_bar_chart_data_usuario;

    mysqli_free_result($qresult);
?>