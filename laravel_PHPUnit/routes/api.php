<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// === Grupo de rotas para usuários ===
Route::prefix('users')->group(function () {
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show'); // Exibe um usuário específico
    Route::get('/{id}', [UserController::class, 'edit'])->name('users.edit'); // Exibe um formulário de edição
    Route::post('/store', [UserController::class, 'store'])->name('users.store'); // Cria um novo usuário
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update'); // Atualiza um usuário
});

// === Grupo de rotas para gerenciamento de usuários ===
// Obs: esse grupo tem acesso as outras rotas de usuário 
Route::prefix('admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index'); // Lista todos os usuários
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy'); // Deleta um usuário
});





// // Grupo de rotas para autenticação (login)
// Route::prefix('auth')->group(function () {
//     Route::post('/login', 'AuthController@login'); // Rota para login
//     Route::post('/logout', 'AuthController@logout'); // Rota para logout
//     Route::post('/refresh', 'AuthController@refresh'); // Rota para refresh token
//     Route::post('/me', 'AuthController@me'); // Rota para detalhes do usuário autenticado
// });



