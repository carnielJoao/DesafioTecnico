<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Agenda</title>
</head>
<body>

    <header>
        <div class="container">
            <a href="https://www.ipm.com.br/">
                <img src="uploads/ipm.svg" alt="Logo IPM">
            </a>
            <a>
                <p>AGENDA DE TAREFAS</p>
            </a>
        </div>
    </header>

    <main>

        <!-- Div onde cria tarefa -->
        <div class="cardAd mt-4">
            <div class="card p-4">
                <h4 class="mb-4">Adicionar Nova Tarefa</h4>
                <form id="taskForm" class="row g-3">
                    <div class="col-md-2">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título" required>
                    </div>
                    <div class="col-md-4">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="1" placeholder="Digite a descrição"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Pendente">Pendente</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Concluido">Concluído</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dataCriacao" class="form-label">Data de Criação</label>
                        <input type="date" class="form-control" id="dataCriacao" name="dataCriacao" required>
                    </div>
                    <div class="col-md-2">
                        <label for="dataConclusao" class="form-label">Data de Conclusão</label>
                        <input type="date" class="form-control" id="dataConclusao" name="dataConclusao" required>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-success" id="submitForm">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Div onde e gerado a lista -->
        <div class="mt-5">
            <h1>Lista de Tarefas</h1>
            <div id="taskList" class="mt-3"></div>
        </div>

        <!-- Div onde e gerado a lista de concluidos -->
        <div class="mt-5">
            <h1>Tarefas Concluidas</h1>
            <div id="taskListConcluidas" class="mt-3"></div>
        </div>

        <!-- Modal de confirmacao de exclusao -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir esta tarefa?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de edicao -->
        <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTaskLabel">Editar Tarefa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editTaskForm">
                            <input type="hidden" id="editTaskId" name="id">
                            <div class="mb-3">
                                <label for="editTitulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="editTitulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDescricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="editDescricao" name="descricao" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-select" id="editStatus" name="status">
                                    <option value="Pendente">Pendente</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Concluido">Concluído</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editDataCriacao" class="form-label">Data de Criação</label>
                                <input type="date" class="form-control" id="editDataCriacao" name="dataCriacao" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDataConclusao" class="form-label">Data de Conclusão</label>
                                <input type="date" class="form-control" id="editDataConclusao" name="dataConclusao" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="saveEditTaskButton">Salvar Alterações</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

<script>
let currentTaskId = null;

// Funcao para carregar a lista de tarefas
function carregarListaDeTarefas() {
    $.ajax({
        url: 'php/listarTarefas.php',
        type: 'GET',
        success: function (response) {
            $('#taskList').html(response);
        },
        error: function () {
            $('#taskList').html('<p>Erro ao carregar a lista de tarefas.</p>');
        }
    });
}

// Funcao para carregar a lista de tarefas concluidas
function carregarListaDeTarefasConcluidas() {
    $.ajax({
        url: 'php/listarTarefasConcluidas.php',
        type: 'GET',
        success: function (response) {
            $('#taskListConcluidas').html(response);
        },
        error: function () {
            $('#taskListConcluidas').html('<p>Erro ao carregar a lista de tarefas.</p>');
        }
    });
}

// Funcao para salvar nova tarefa
function salvarTarefa() {
    const titulo = $('#titulo').val().trim();
    const descricao = $('#descricao').val().trim();
    const dataCriacao = $('#dataCriacao').val();
    const dataConclusao = $('#dataConclusao').val();

    if (!titulo) {
        alert('O campo "Título" é obrigatório.');
        return;
    }

    if (!descricao) {
        alert('O campo "Descrição" é obrigatório.');
        return;
    }

    if (!dataCriacao) {
        alert('O campo "Data de Criação" é obrigatório.');
        return;
    }

    if (!dataConclusao) {
        alert('O campo "Data de Conclusão" é obrigatório.');
        return;
    }

    if (new Date(dataConclusao) < new Date(dataCriacao)) {
        alert('A data de conclusão não pode ser anterior à data de criação.');
        return;
    }

    const formData = {
        titulo: titulo,
        descricao: descricao,
        status: $('#status').val(),
        dataCriacao: dataCriacao,
        dataConclusao: dataConclusao,
        submit: true
    };

    $.ajax({
        url: 'php/salvarTarefa.php',
        type: 'POST',
        data: formData,
        success: function (response) {
            alert('Tarefa salva com sucesso!');
            $('#taskForm')[0].reset(); 
            carregarListaDeTarefas();
            carregarListaDeTarefasConcluidas();
        },
        error: function (xhr, status, error) {
            alert('Erro ao salvar a tarefa: ' + error);
        }
    });
}

// Funcao para excluir tarefa
function excluirTarefa(taskId) {
    $.ajax({
        url: 'php/deletarTarefa.php',
        type: 'POST',
        data: { id: taskId },
        success: function (response) {
            const res = JSON.parse(response);
            if (res.success) {
                alert(res.message);
                carregarListaDeTarefas();
            } else {
                alert('Erro: ' + res.message);
            }
        },
        error: function () {
            alert('Erro ao tentar excluir a tarefa.');
        }
    });
}

// Funcao para abrir o modal de edicao
function abrirModalEdicao(taskId) {
    $.ajax({
        url: 'php/obterTarefa.php',
        type: 'GET',
        data: { id: taskId },
        success: function (response) {
            const task = JSON.parse(response);

            $('#editTaskId').val(task.id_task);
            $('#editTitulo').val(task.title_task);
            $('#editDescricao').val(task.description_task);
            $('#editStatus').val(task.status_task);
            $('#editDataCriacao').val(task.creationDate_task);
            $('#editDataConclusao').val(task.endDate_task);

            $('#editTaskModal').modal('show');
        },
        error: function () {
            alert('Erro ao carregar os dados da tarefa para edição.');
        }
    });
}

// Funcao para salvar as alteracoes da tarefa
function salvarAlteracoesTarefa() {
    const formData = {
        id: $('#editTaskId').val(),
        titulo: $('#editTitulo').val(),
        descricao: $('#editDescricao').val(),
        status: $('#editStatus').val(),
        dataCriacao: $('#editDataCriacao').val(),
        dataConclusao: $('#editDataConclusao').val()
    };

    $.ajax({
        url: 'php/editarTarefa.php',
        type: 'POST',
        data: formData,
        success: function (response) {
            const res = JSON.parse(response);
            if (res.success) {
                alert(res.message);
                $('#editTaskModal').modal('hide');
                carregarListaDeTarefas(); 
                carregarListaDeTarefasConcluidas();
            } else {
                alert('Erro: ' + res.message);
            }
        },
        error: function () {
            alert('Erro ao salvar as alterações.');
        }
    });
}

// Eventos
$(document).on('click', '.delete-icon', function () {
    const taskId = $(this).data('id');
    currentTaskId = taskId;
    $('#confirmDeleteModal').modal('show');
});

$('#confirmDeleteButton').on('click', function () {
    if (currentTaskId) {
        excluirTarefa(currentTaskId);
        $('#confirmDeleteModal').modal('hide');
    }
});

$(document).on('click', '.edit-icon', function () {
    const taskId = $(this).closest('tr').find('.delete-icon').data('id');
    abrirModalEdicao(taskId);
});

$('#saveEditTaskButton').on('click', function () {
    salvarAlteracoesTarefa();
});

$('#submitForm').on('click', function () {
    salvarTarefa();
});

// Inicializacao
$(document).ready(function () {
    carregarListaDeTarefas();
    carregarListaDeTarefasConcluidas();
});

</script>

</body>
</html>
