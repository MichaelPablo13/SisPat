<?php
    include "conexao.php";
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    // create a file pointer connected to the output stream
    $output = fopen("php://output", "w");  
    
    // output the column headings
    fputcsv($output, array('idcomputador',
        'nome_computador',
        'modelo',
        'tipo',
        'centro_de_custo',
        'inicio_de_aluguel',
        'fim_de_aluguel',
        'date_created',
        'status',
        'data_desativacao',
        'usuarios_idUsuarios',
        'computador_idcomputador',
        'idUsuarios',
        'nome',
        'sobrenome',
        'departamento',
        'centro_de_custo',
        'localizacao',
        'nome_de_usuario',
        'responsavel_it',
        'active',
        'data_criacao',
    'data_desativacao'));  
    
    $query = "SELECT * FROM computador c 
                INNER JOIN usuarios_computador uc ON uc.computador_idcomputador = c.idcomputador 
                INNER JOIN usuarios u ON u.idUsuarios = uc.usuarios_idUsuarios";

    $result = mysqli_query($conexao, $query);
    
    // loop over the rows, outputting them
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
?>