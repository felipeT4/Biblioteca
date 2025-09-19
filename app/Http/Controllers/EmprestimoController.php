<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
     public function store(Request $request){
        $emprestimo = Emprestimo::create([
        'data_emprestimo' => $request->data_emprestimo,
        'data_devolucao' => $request->data_devolucao,
        'codigo_membro' => $request->codigo_membro,
        'codigo_livro' => $request->codigo_livro

        ]);
        return response()->json($emprestimo);
}

    public function index(){
       
        $emprestimo = Emprestimo::all();

        return response()->json($emprestimo);
    }
 
    public function update(Request $request) {
        //buscar a tarefa que será atualizada
        $emprestimo = Emprestimo::find($request->id);

        //Verificar se a tarefa existe
        if ($emprestimo == null){
            return response() ->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }  
        //verificar se o campo existe na request  
        if(isset($request->data_emprestimo )){
        $emprestimo-> data_emprestimo = $request-> data_emprestimo;
        }
        //verificar se o campo data_hora existe na request  
         if(isset($request->data_devolucao )){
        $emprestimo->data_devolucao = $request->data_devolucao;
         }
         //verificar se o campo descricao existe na request
          if(isset($request->codigo_membro )){
        $emprestimo->codigo_membro = $request->codigo_membro;
          }
           if(isset($request->codigo_livro )){
        $emprestimo->codigo_livro = $request->codigo_livro;
          }

          $emprestimo->update();

          return response()-> json([
            'mensagem' => 'atualiada'
          ]);

        
    }

    public function show($id) {
        //select * from tarefas where id = 1
        $emprestimo = Emprestimo::find($id);
        // verifica se a tarefa existe
        if ( $emprestimo == null){
            return response() -> json([
                'erro' => 'Autor não encontrado'
            ]);
        }
        return response() -> json($emprestimo);
    }

    public function delete($id) {

         $emprestimo = Emprestimo::find($id);

        if ($emprestimo == null) {
            return response()-> json([
                'erro' => 'tarefa não encontrada'
            ]);
        }

        $emprestimo->delete();

        return response()-> json([
            'mensagem ' => 'excluido'
        ]);



    }



}