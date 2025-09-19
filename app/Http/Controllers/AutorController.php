<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function store(Request $request){
        $autor = Autor::create([
            'nome_completo' => $request->nome_completo,
            'data_nascimento' => $request->data_nascimento,
            'nacionalidade' => $request->nacionalidade,
            
        ]);

        return response()->json($autor); 

    }

    public function index(){
       
        $autor = Autor::all();

        return response()->json($autor);
    }


     public function update(Request $request) {
        //buscar a tarefa que será atualizada
        $autor = Autor::find($request->id);

        //Verificar se a tarefa existe
        if ($autor == null){
            return response() ->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }  
        //verificar se o campo existe na request  
        if(isset($request->nome_completo )){
        $autor-> nome_completo = $request-> nome_completo;
        }
        //verificar se o campo data_hora existe na request  
         if(isset($request->data_nascimento )){
        $autor->data_nascimento = $request->data_nascimento;
         }
         //verificar se o campo descricao existe na request
          if(isset($request->nacionalidade )){
        $autor->nacionalidade = $request->nacionalidade;
          }

          $autor->update();

          return response()-> json([
            'mensagem' => 'atualiada'
          ]);

        
    }

    public function show($id) {
        //select * from tarefas where id = 1
        $autor = Autor::find($id);
        // verifica se a tarefa existe
        if ($autor == null){
            return response() -> json([
                'erro' => 'Autor não encontrado'
            ]);
        }
        return response() -> json($autor);
    }

    public function delete($id) {

        $autor = Autor::find($id);

        if ($autor == null) {
            return response()-> json([
                'erro' => 'tarefa não encontrada'
            ]);
        }

        $autor->delete();

        return response()-> json([
            'mensagem ' => 'excluido'
        ]);



    }
}
