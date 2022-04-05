<?php

namespace App\Util;

use App\Entity\Profissional;
use App\Repository\EspecialidadeRepository;

class ProfissionalFactory implements EntidadeFactory
{
    /**
     * @var EspecialidadeRepository
     */
    private EspecialidadeRepository $especialidadeRepository;

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {

        $this->especialidadeRepository = $especialidadeRepository;
    }

    public function criarEntidade(string $json):Profissional
    {
        $dadoEmJson = json_decode($json);
        $especialidadeId = $dadoEmJson->especialidadeId;

        $especialidade = $this->especialidadeRepository->find($especialidadeId);
        $profissional = new Profissional();
        $profissional->setCrm($dadoEmJson->crm)
                     ->setNome($dadoEmJson->nome)
                     ->setEspecialidade($especialidade);

        return $profissional;
    }
}