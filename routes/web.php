<?php

use App\Models\carros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastar-carro',function(Request $dados){

    $validate = Validator::make($dados->all(),[
        "modelo_carro" => "required|max:100",
        "data_aquisicao" => "required",
        "placa" => "required|max:15"

    ]);
    if ($validate->fails()) {
        return response()->json($validate->errors(), 400);
      }

        Carros::create([
            'modelo' => $dados->modelo_carro,
            'data_aquisicao' => $dados->data_aquisicao,
            'placa'=> $dados->placa
            
        ]);
     
        
});

Route::get('/listar-carros',function(){
    $carro = Carros::all();

    return response()->json($carro);
});

Route::get('/mostrar-carro/{id_do_carro}',function($id_do_carro){
    $carro = Carros::findOrFail($id_do_carro);

    return view('edit', ['carro' => $carro]);
});

Route::delete('/excluir-carro/{id_do_carro}',function($id_do_carro){
    $carro = Carros::findOrFail($id_do_carro);

    $carro->delete();

});

Route::put('/atualizar-carro/{id_do_carro}',function(Request $dados,$id_do_carro){
    
    $carro = Carros::findOrFail($id_do_carro);

    $carro->modelo = $dados->modelo_carro;
    $carro->data_aquisicao = $dados->data_aquisicao;
    $carro->placa = $dados->placa;

    $carro->save();

});