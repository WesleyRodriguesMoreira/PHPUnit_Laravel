<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function store(UserRequest $request){
        try {
            // Cria um novo usuário com os dados recebidos na requisição
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
        
            // Salva no log que o usuário foi cadastrado com sucesso
            Log::info('Usuário(a) cadastrado(a) com sucesso', ['user_id' => $user->id, 'email' => $user->email]);
        
            // Retorna uma resposta JSON com o usuário criado e um código de status 201 (Created)
            return response()->json([
                'message' => 'Conta Cadastrada com Sucesso',
                'user' => $user,
            ], 201);
        
        } catch (\Exception $e) {
            // Salva no log que ocorreu um erro ao cadastrar o usuário
            Log::error('Erro ao cadastrar usuário', ['error' => $e->getMessage()]);
        
            // Em caso de erro, retorna uma resposta JSON com uma mensagem de erro e um código de status 500 (Internal Server Error)
            return response()->json([
                'error' => 'Erro no sistema, Conta não Cadastrada :(',
                'message' => $e->getMessage(),
            ], 500);
        }
    }    
}
