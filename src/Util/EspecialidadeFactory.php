<?php

namespace App\Util;

use App\Entity\Especialidade;

class EspecialidadeFactory implements EntidadeFactory
{
    public function criarEntidade(string $json): Especialidade
    {
        $dadosEmJson = json_decode($json);

        $novaEspecialidade = new Especialidade();
        $novaEspecialidade->setDescricao($dadosEmJson->descricao);

        return $novaEspecialidade;
    }

}