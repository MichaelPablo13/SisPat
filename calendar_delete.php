<?php
    include "conexao.php";
//delete.php

if (isset($_POST["id"])) {
    $query = "DELETE from events WHERE id=:id";
    $statement = mysqli_prepare($conexao, $query);
    // $statement = $connect->prepare($query);
    $result = mysqli_stmt_execute($statement);
    array(':id' => $_POST['id']);
}

?>
