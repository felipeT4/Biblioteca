<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;

class MembroController extends Controller
{
     public function store(Request $request){
        $membro = Membro::create([
        'nome_completo' => $request->nome_completo,
        'endereco' => $request->endereco,
        'telefone' => $request->telefone
        ]);
        return response()->json($membro);
}
    public function index(){

    $membro = Membro::all();
        return response()->json($membro);
    }

     public function update(Request $request) {
        //buscar a tarefa que será atualizada
        $membro = Membro::find($request->id);

        //Verificar se a tarefa existe
        if ($membro == null){
            return response() ->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }  
        //verificar se o campo existe na request  
        if(isset($request->nome_completo )){
        $membro-> nome_completo = $request-> nome_completo;
        }
        //verificar se o campo data_hora existe na request  
         if(isset($request->endereco )){
        $membro->endereco = $request->endereco;
         }
         //verificar se o campo descricao existe na request
          if(isset($request->telefone )){
        $membro->telefone = $request->telefone;
          }

          $membro->update();

          return response()-> json([
            'mensagem' => 'atualiada'
          ]);

        
    }

    public function show($id) {
        //select * from tarefas where id = 1
        $membro = Membro::find($id);
        // verifica se a tarefa existe
        if ($membro == null){
            return response() -> json([
                'erro' => 'Autor não encontrado'
            ]);
        }
        return response() -> json($membro);
    }

    public function delete($id) {

        $membro = Membro::find($id);

        if ($membro == null) {
            return response()-> json([
                'erro' => 'tarefa não encontrada'
            ]);
        }

        $membro->delete();

        return response()-> json([
            'mensagem ' => 'excluido'
        ]);



    }




}