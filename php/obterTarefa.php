<?php

include_once('../conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM tasks WHERE id_task = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['success' => false, 'message' => 'Tarefa não encontrada.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID inválido.']);
}

?>
