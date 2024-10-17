<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;



class ProdutoController extends Controller
{

    public function index()
    {
        $produto = Produto::all();
        return view('produto.index', compact('produto'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $dados = Produto::tratarDadosForm($request->all());

        $validator = Validator::make($dados, [
            'nome_produto' => 'required|string|max:500',
            'valr_produto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Produto::create($dados);

        return redirect('admin/produto')->with('success', 'Produto Cadastrado!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produto.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $dados = Produto::tratarDadosForm($request->all());

        $validator = Validator::make($dados, [
            'nome_produto' => 'required|string|max:500',
            'valr_produto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $produto->update($dados);

        return redirect('admin/produto')->with('success', 'Produto Atualizado!');
    }

    public function destroy($id)
    {
        $product = Produto::findOrFail($id);
        $product->delete();
        return redirect('admin/produto')->with('success', 'Product deleted successfully.');
    }

    public function compra()
    {
        $produto = Produto::all();

        return view('produto.compra', compact('produto'));
    }
}
