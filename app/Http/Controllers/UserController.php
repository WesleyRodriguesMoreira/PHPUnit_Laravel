<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Illuminate\Database\QueryException;

class UserController extends Controller{

    public function index(){
        try{
            // Obtenha a lista paginada de usuários
            $users = User::paginate(10);

            // Retorne a coleção de usuários usando o UserResource
            return UserResource::collection($users);

        }catch (QueryException $e){

            // Se ocorrer um erro de consulta ao banco de dados, registre o erro no log
            Log::error('Erro de consulta ao banco de dados: ' . $e->getMessage());

            // Retorne uma resposta de erro em JSON
            return response()->json(['error' => 'Erro ao acessar o banco de dados.'], 500);

        }catch(Exception $e){

            // Se ocorrer qualquer outro tipo de exceção, registre o erro no log
            Log::error('Erro inesperado: ' . $e->getMessage());

            // Retorne uma resposta de erro em JSON
            return response()->json(['error' => 'Ocorreu um erro inesperado.'], 500);
        }
    }


    /** @var int $user Recebe o id em forma de parâmetro, que vem da rota (api.php) */
    public function show(User $user){
        try{
            // Obtenha o id do usuário e retorna os dados
            return new UserResource($user);

        }catch (QueryException $e){

            // Se ocorrer um erro de consulta ao banco de dados, registre o erro no log
            Log::error('Erro de consulta ao banco de dados: ' . $e->getMessage());
    
            // Retorne uma resposta de erro em JSON
            return response()->json(['error' => 'Erro, usuário não encontrado.'], 404);
        } catch (Exception $e) {
            // Se ocorrer qualquer outro tipo de exceção, registre o erro no log
            Log::error('Erro inesperado: ' . $e->getMessage());
    
            // Retorne uma resposta de erro em JSON
            return response()->json(['error' => 'Ocorreu um erro inesperado.'], 500);
        }
    }
}