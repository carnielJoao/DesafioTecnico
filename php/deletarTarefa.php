<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $query = "DELETE FROM tasks WHERE id_task = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Tarefa excluída com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao excluir a tarefa.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}
?>
