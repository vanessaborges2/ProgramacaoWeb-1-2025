<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view("produtos.index", compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("produtos.create", compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $dados = $request->all();
            if ($request->hasFile('foto')){
                $dados['foto'] = $request->file('foto')->store('produtos', 'public');
            }
            Produto::create($dados);
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto inserido com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao criar o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')
                ->with('erro' , 'Erro ao criar o produto!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view("produtos.show", compact('produto', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view("produtos.edit", compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $produto = Produto::findOrFail($id);
            $dados = $request->all();
            if ($request->hasFile('foto')){
                if ($produto->foto && Storage::exists('public/'.$produto->foto))
                    Storage::delete('public/'.$produto->foto);
                $dados['foto'] = $request->file('foto')->store('produtos', 'public');
            }
            $produto->update($dados);
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto alterado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')
                ->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $produto = Produto::findOrFail($id);
            if ($produto->foto && Storage::exists('public/'.$produto->foto))
                    Storage::delete('public/'.$produto->foto);
            $produto->delete();
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto excluído com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao excluir o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id
            ]);
            return redirect()->route('produtos.index')
                ->with('erro', 'Erro ao excluir!');
        }
    }
}
