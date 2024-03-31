<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Grupo de rotas para CRUD de usuários
Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index')->name('users.index'); // Lista todos os usuários
    Route::get('/{id}', 'UserController@show')->name('users.show'); // Exibe um usuário específico
    Route::get('/{id}', 'UserController@edit')->name('users.edit'); // Exibe um formulário de edição
    Route::get('/', 'UserController@create')->name('users.create'); // Exibe um formulário de cadastro

    Route::post('/', 'UserController@store')->name('users.store'); // Cria um novo usuário
    Route::put('/{id}', 'UserController@update')->name('users.update'); // Atualiza um usuário
    Route::delete('/{id}', 'UserController@destroy')->name('users.destroy'); // Deleta um usuário
});

// // Grupo de rotas para autenticação (login)
// Route::prefix('auth')->group(function () {
//     Route::post('/login', 'AuthController@login'); // Rota para login
//     Route::post('/logout', 'AuthController@logout'); // Rota para logout
//     Route::post('/refresh', 'AuthController@refresh'); // Rota para refresh token
//     Route::post('/me', 'AuthController@me'); // Rota para detalhes do usuário autenticado
// });
