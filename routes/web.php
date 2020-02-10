<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach($clientes as $c) {
        echo "<p>Id: " . $c->id . "</p>";
        echo "<p>Nome: " . $c->nome . "</p>";
        echo "<p>Telefone: " . $c->telefone . "</p>";
        echo "<br />";
        echo "<p>Rua: " . $c->endereco->rua . "</p>";
        echo "<p>Numero: " . $c->endereco->numero . "</p>";
        echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
        echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
        echo "<p>UF: " . $c->endereco->uf . "</p>";
        echo "<p>CEP: " . $c->endereco->cep . "</p>";
        
        echo "<hr>";
    }
});


Route::get('/enderecos', function () {
    $endereco = Endereco::all();
    foreach($endereco as $end) {
        echo "<p>Cliente Id: " . $end->cliente_id . "</p>";
        
        echo "<p>Nome: " . $end->cliente->nome . "</p>";
        echo "<p>Telefone: " . $end->cliente->telefone . "</p>";

        echo "<p>Rua: " . $end->rua . "</p>";
        echo "<p>Numero: " . $end->numero . "</p>";
        echo "<p>Bairro: " . $end->bairro . "</p>";
        echo "<p>Cidade: " . $end->cidade . "</p>";
        echo "<p>UF: " . $end->uf . "</p>";
        echo "<p>CEP: " . $end->cep . "</p>";
        echo "<hr>";
    }
});

