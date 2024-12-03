<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    include_once('../conexao.php');

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $dataCriacao = $_POST['dataCriacao'];
    $dataConclusao = $_POST['dataConclusao'];

    $query = "INSERT INTO tasks (
                title_task, description_task, status_task, creationDate_task, endDate_task
              ) VALUES (?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sssss', $titulo, $descricao, $status, $dataCriacao, $dataConclusao);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            http_response_code(500); 
            echo 'Erro ao salvar o registro: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        http_response_code(500);
        echo 'Erro ao preparar a consulta: ' . $mysqli->error;
    }

    $mysqli->close();
}
?>
