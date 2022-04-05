<?php

namespace App\Controller;

use App\Entity\Especialidade;
use App\Repository\EspecialidadeRepository;
use App\Util\EspecialidadeFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="especialidade_controller")
 */
class EspecialidadesController extends BaseController
{

    public function __construct(EntityManagerInterface  $entityManager,
                                EspecialidadeRepository $especialidadeRepository,
                                EspecialidadeFactory    $factory)
    {
        parent::__construct($especialidadeRepository,$entityManager, $factory);

    }

    /**
     * @param Especialidade $entidadeEnviada
     * @param Especialidade $entidadeExistente
     */
    public function atualizarEntidadeExistente($entidadeEnviada, $entidadeExistente)
    {
        $entidadeExistente->setDescricao($entidadeEnviada->getDescricao());
    }
}
