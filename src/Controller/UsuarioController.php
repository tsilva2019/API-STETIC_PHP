<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use App\Util\UsuarioFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="usuario_controller")
 */
class UsuarioController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager, UsuarioFactory $factory,
                                UsuarioRepository $repository)
    {
        parent::__construct($repository, $entityManager,$factory);

    }


    /**
     * @param Usuario $entidadeEnviada
     * @param Usuario $entidadeExistente
     */
    public function atualizarEntidadeExistente($entidadeEnviada, $entidadeExistente)
    {
        $entidadeExistente->setNomeCompleto($entidadeEnviada->getNomeCompleto());
        $entidadeExistente->setLogin($entidadeEnviada->getLogin());
        $entidadeExistente->setSenha($entidadeEnviada->getSenha());
    }
}
