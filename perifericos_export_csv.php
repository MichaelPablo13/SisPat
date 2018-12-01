<?php
    include "conexao.php";
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    // create a file pointer connected to the output stream
    $output = fopen("php://output", "w");  
    
    // output the column headings
    fputcsv($output, array('idPeriferico', 'nome_periferico', 'descricao', 'data_criado',
    'data_desativado', 'status', 'periferico_idPeriferico', 'usuarios_idUsuarios',
    'idUsuarios', 'nome', 'sobrenome', 'departamento', 'centro_de_custo', 'nome_de_usuario',
    'responsavel_it', 'localizacao', 'active', 'data_criacao', 'data_desativacao'));  
    
    $query = "SELECT * FROM periferico p 
                INNER JOIN usuarios_perifericos uc 
                    ON uc.periferico_idPeriferico = p.idPeriferico 
                INNER JOIN usuarios u 
                    ON u.idUsuarios = uc.usuarios_idUsuarios";

    $result = mysqli_query($conexao, $query);
    
    // loop over the rows, outputting them
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
?>