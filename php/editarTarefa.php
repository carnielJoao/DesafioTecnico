<?php

include_once('../conexao.php');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $dataCriacao = $_POST['dataCriacao'];
    $dataConclusao = $_POST['dataConclusao'];

    $query = "UPDATE tasks SET title_task = ?, description_task = ?, status_task = ?, creationDate_task = ?, endDate_task = ? WHERE id_task = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssssi', $titulo, $descricao, $status, $dataCriacao, $dataConclusao, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Tarefa atualizada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar a tarefa.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
}

?>
