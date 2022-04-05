<?php

namespace App\Util;

use App\Entity\Usuario;

class UsuarioFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): Usuario{

        $usuarioEmJson = json_decode($json);

        $usuario = new Usuario();
        $usuario->setNomeCompleto($usuarioEmJson->nomeCompleto);
        $usuario->setLogin($usuarioEmJson->login);
        $usuario->setSenha($usuarioEmJson->senha);

        return $usuario;
    }
}