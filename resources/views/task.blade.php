<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Botão para voltar à página inicial -->
    <a href="{{ route('listas.index') }}" class="back-button">Voltar</a>

    <h1 class="center">Editar Tarefa</h1>

    <!-- Título da lista -->
    <h2 class="center">{{ $lista->title }}</h2>

    <!-- Número de tarefas concluídas / Número de tarefas totais -->
    <p class="task-stats">{{ $lista->completed_tasks }} / {{ $lista->total_tasks }}</p>

    <!-- Formulário para adicionar nova tarefa -->
    <form action="{{ route('tarefas.store') }}" method="POST" class="add-form">
        @csrf
        <input type="hidden" name="lista_id" value="{{ $lista->id }}">
        <input type="text" name="title" placeholder="Nova Tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Lista de tarefas -->
    <ul>
        @foreach ($lista->tarefas as $tarefa)
            <li>
                <div class="task">
                    <!-- Botão para marcar como concluída -->
                    <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="completed" value="1" {{ $tarefa->completed ? 'checked' : '' }}>
                        {{ $tarefa->title }}
                        <button type="submit">Salvar</button>
                    </form>

                    <!-- Botão para excluir tarefa -->
                    <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
</body>
</html>