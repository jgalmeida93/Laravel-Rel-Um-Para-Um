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

Route::get("/inserir", function() {

    $c = new Cliente();

    $c->nome = "José Almeida";
    $c->telefone = "11 99244-7878";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Avenida Brasil";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13010-456";
    // $e->cliente_id = $c->id; uma opção
    // ou através do relacionamento

    // Através do cliente, chamar a função endereço()
    // Salvando dentro do endereço da tablea cliente
    $c->endereco()->save($e);

    $c = new Cliente();

    $c->nome = "Marcos Silva";
    $c->telefone = "11 99212-5878";
    $c->save();
    
    $e = new Endereco();
    $e->rua = "Avenida Abreu";
    $e->numero = 4200;
    $e->bairro = "Colorado";
    $e->cidade = "Londrina";
    $e->uf = "PR";
    $e->cep = "43874-456";
    // $e->cliente_id = $c->id; uma opção
    // ou através do relacionamento

    // Através do cliente, chamar a função endereço()
    // Salvando dentro do endereço da tablea cliente
    $c->endereco()->save($e); 
});

Route::get("/clientes/json", function() {
    // $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get("/enderecos/json", function() {
    // $enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});