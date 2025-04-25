<!DOCTYPE html>
<html>
<head>
    <title>Editar Bolo</title>
</head>
<body>
    <h1>Editar Bolo</h1>

    <form action="/produtos/{{ $produto->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome do bolo:</label><br>
        <input type="text" name="nome" value="{{ $produto->nome }}"><br><br>

        <label>Preço:</label><br>
        <input type="text" name="preco" value="{{ $produto->preco }}"><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao">{{ $produto->descricao }}</textarea><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <br><a href="/produtos">← Voltar</a>
</body>
</html>
