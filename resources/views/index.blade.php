<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1 class="center">ToDo List</h1>

    <!-- Formulário para adicionar nova lista -->
    <form action="{{ route('listas.store') }}" method="POST" class="add-form">
        @csrf
        <input type="text" name="title" placeholder="Nova Lista" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Lista de listas -->
    <ul>
        @foreach ($listas as $lista)
            <li>
                <div class="list-header">
                    <!-- Ícone de lista concluída (opcional) -->
                    @if ($lista->completed)
                        <span class="completed-icon"></span>
                    @endif

                    <!-- Título da lista e botões -->
                    <a href="{{ route('listas.show', $lista) }}">{{ $lista->title }}</a>
                    
                    <!-- Botão para excluir lista -->
                    <form action="{{ route('listas.destroy', $lista) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>
