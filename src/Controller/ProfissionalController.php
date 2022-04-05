<?php
namespace App\Controller;

use App\Entity\Profissional;
use App\Repository\ProfissionaisRepository;
use App\Util\ProfissionalFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @ORM\Entity
 * @ORM\Table(name="profissional_controller")
 */
class ProfissionalController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
                                ProfissionalFactory $factory,
                                ProfissionaisRepository $repository)
    {
        parent::__construct($repository, $entityManager,$factory);
        $this->entityManager = $entityManager;
        $this->profissionalFactory = $factory;
        $this->repository = $repository;
    }



    #[Route("/especialidades/{especialidadeID}/profissionais", methods: "GET")]
    public function buscarPorEspecialidade(int $especialidadeID): Response
    {
        $profissionaisList = $this->repository->findBy([
            "especialidade" => $especialidadeID
        ]);
            return new JsonResponse($profissionaisList);
    }

    /**
     * @param Profissional $entidadeEnviada
     * @param Profissional $entidadeExistente
     */
    public function atualizarEntidadeExistente($entidadeEnviada, $entidadeExistente)
    {
        $entidadeExistente->setCrm($entidadeEnviada->getCrm());
        $entidadeExistente->setNome($entidadeEnviada->getNome());
        $entidadeExistente->setEspecialidade($entidadeEnviada->getEspecialidade());
    }
}