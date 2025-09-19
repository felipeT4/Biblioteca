<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
     public function store(Request $request){
        $livro = Livro::create([
        'titulo' => $request->titulo,
        'ano_publicacao' => $request->ano_publicacao,
        'genero' => $request->genero,
        ]);

            return response()->json($livro);
        }

    public function index(){
       
        $livro = Livro::all();

        return response()->json($livro);
    }
 

    
     public function update(Request $request) {
        //buscar a tarefa que será atualizada
        $livro = Livro::find($request->id);

        //Verificar se a tarefa existe
        if ($livro == null){
            return response() ->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }  
        //verificar se o campo existe na request  
        if(isset($request->titulo )){
        $livro-> titulo = $request-> titulo;
        }
        //verificar se o campo data_hora existe na request  
         if(isset($request->ano_publicacao )){
        $livro->ano_publicacao = $request->ano_publicacao;
         }
         //verificar se o campo descricao existe na request
          if(isset($request->genero )){
        $livro->genero = $request->genero;
          }

          $livro->update();

          return response()-> json([
            'mensagem' => 'atualiada'
          ]);

        
    }

    public function show($id) {
        //select * from tarefas where id = 1
        $livro = Livro::find($id);
        // verifica se a tarefa existe
        if ($livro == null){
            return response() -> json([
                'erro' => 'Autor não encontrado'
            ]);
        }
        return response() -> json($livro);
    }

    public function delete($id) {

        $livro = Livro::find($id);

        if ($livro == null) {
            return response()-> json([
                'erro' => 'tarefa não encontrada'
            ]);
        }

        $livro->delete();

        return response()-> json([
            'mensagem ' => 'excluido'
        ]);



    }





}