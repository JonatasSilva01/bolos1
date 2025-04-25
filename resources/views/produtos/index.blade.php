<!DOCTYPE html>
<html>
<head>
    <title>Loja de Bolos</title>
</head>
<body>
    <h1>Lista de Bolos</h1>

    @foreach ($produtos as $produto)
    <div style="margin-bottom: 20px;">
        <h2>{{ $produto->nome }}</h2>
        <p>{{ $produto->descricao }}</p>
        <strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong>

        <form action="/produtos/{{ $produto->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>

        <a href="/produtos/{{ $produto->id }}/editar">Editar</a>
    </div>
    @endforeach

</body>
</html>
