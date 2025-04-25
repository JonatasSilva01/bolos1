<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function Index() {
        $produtos = Produto::all(); // pega todos os bolos
        return view('produtos.index', compact('produtos'));
    }

    // Mostra o formulário
    public function create()
    {
        return view('produtos.create');
    }

    // Salva no banco de dados
    public function store(Request $request)
    {
        // Validação simples
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'descricao' => 'nullable'
        ]);

        // Cria novo bolo
        Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
        ]);

        // Redireciona pra lista de produtos
        return redirect('/produtos');
    }

    // Exibe o formulário de edição
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    // Atualiza o bolo no banco de dados
    public function update(Request $request, Produto $produto)
    {
        // Validação
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'descricao' => 'nullable'
        ]);

        // Atualiza o bolo
        $produto->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
        ]);

        // Redireciona de volta
        return redirect('/produtos');
    }


    // Exclui o bolo do banco de dados
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect('/produtos');
    }
}
