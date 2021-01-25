<?php

// throw new Exception("Essa é uma exceção");

// não é executado, código é encerrado na exceção
// echo "\n ... executando ... \n";

function validarUsuario(array $usuario){

    if(empty($usuario['codigo']) || empty($usuario['nome']) || empty($usuario['idade'])){
        return false;
    }

    return true;
}

$usuario = [
    'codigo'=> 1,
    'nome' => '',
    'idade' => 57,
];

$usuarioValidado = validarUsuario($usuario);

if(!$usuarioValidado){

    echo "Usuário Inválido!";
    return false;

}else{

    echo "Usuário Válido!";
    return true;
    
}