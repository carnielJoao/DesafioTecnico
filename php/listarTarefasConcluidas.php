<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once('../conexao.php');

$query = "SELECT * FROM tasks WHERE status_task = 'Concluido' ORDER BY creationDate_task DESC";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Título</th>';
    echo '<th>Descrição</th>';
    echo '<th>Status</th>';
    echo '<th>Data de Criação</th>';
    echo '<th>Data de Conclusão</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['title_task']) . '</td>';
        echo '<td>' . nl2br(htmlspecialchars($row['description_task'])) . '</td>';
        echo '<td>' . htmlspecialchars($row['status_task']) . '</td>';
        echo '<td>' . htmlspecialchars($row['creationDate_task']) . '</td>';
        echo '<td>' . htmlspecialchars($row['endDate_task']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>Nenhuma tarefa encontrada.</p>';
}

?>
