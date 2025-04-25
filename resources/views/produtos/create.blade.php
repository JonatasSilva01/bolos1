<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Bolo</title>
</head>
<body>
    <h1>Novo Bolo</h1>

    <form action="/produtos" method="POST">
        @csrf

        <label>Nome do bolo:</label><br>
        <input type="text" name="nome"><br><br>

        <label>Preço:</label><br>
        <input type="text" name="preco"><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br><a href="/produtos">← Voltar</a>
</body>
</html>
