<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


Class CategoriaController extends Controller {

    //CRUD CATEGORIA: R
    public function index() {

        $listaCategorias = Categoria::orderByDesc('id_categoria')
                                                          ->get();

        return view('admin.categoria.index', compact('listaCategorias'));

    }

    //CRUD CATEGORIA: C
    public function store(Request $request){

        // Validar dados
        $dados = $request->validate([
            'nome_categoria' => 'required|max:30',
            'status_categoria' => 'required|in:ATIVO,INATIVO'
        ]);


        // Cadastrar no banco
        try{
                        

            DB::beginTransaction();

            $categoria = Categoria::create([
                'nome_categoria' => $dados['nome_categoria'],
                'status_categoria' => $dados['status_categoria']
            ]);

            $categoria->save();

            DB::commit();

            return redirect()
                ->route('admin.categoria.index')
                ->with('sucesso', 'Categoria: ' . $categoria->nome_categoria .  ' cadastrada com sucesso!');

        }catch(\Throwable $erro){

            DB::rollBack();

            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar a categoria. Tente novamente mais tarde!');

                //$erro->getMessage() para mostrar o erro, usar só no desenvolvimento

        }

    }

    //CRUD CATEGORIA: U
    public function update(Request $request, int $id){
       
        // Validar dados
        $dados = $request->validate([
            'nome_categoria' => 'required|max:30',
            'status_categoria' => 'required|in:ATIVO,INATIVO'
        ]);

        // buscar a categoria no banco
        $categoria = Categoria::findOrFail($id);

        try{

            $categoria->update([
                'nome_categoria' => $dados['nome_categoria'],
                'status_categoria' => $dados['status_categoria']
            ]);

            return redirect()
                ->route('admin.categoria.index')
                ->with('sucesso', 'Categoria: ' . $categoria->nome_categoria . ' foi atualizada com sucesso!');

        }catch(\Throwable $erro){

            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível atualizar a categoria. Tente novamente mais tarde!');

        }

    }

    //CRUD CATEGORIA: D (U) - ATIVAR e DESATIVAR
    public function status(Request $request, int $id) {

        // buscar a categoria no banco
        $categoria = Categoria::findOrFail($id);

        try{

            $novoStatus = $categoria->status_categoria === 'ATIVO' ? 'INATIVO' : 'ATIVO';

            //Atualziar no banco
            $categoria->update([
                'status_categoria' => $novoStatus
            ]);

            $mensagem = $novoStatus === 'ATIVO' ? 'Categoria: ' . $categoria->nome_categoria . ' ativada com sucesso!' : 'Categoria: ' . $categoria->nome_categoria . ' desativada com sucesso!';

            return redirect()
                ->route('admin.categoria.index')
                ->with('sucesso', $mensagem);

        }catch(\Throwable $erro){

            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível atualizar o status da categoria. Tente novamente mais tarde!');

        }

    }

}