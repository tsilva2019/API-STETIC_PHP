<?php

namespace App\Controller;

use App\Util\EntidadeFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

abstract class BaseController extends AbstractController
{
    /**
     * @var ObjectRepository
     */
    protected ObjectRepository $repository;
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;
    /**
     * @var EntidadeFactory
     */
    protected EntidadeFactory $factory;

    public function __construct(ObjectRepository $repository,
                                EntityManagerInterface $entityManager,
                                EntidadeFactory $factory)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->factory = $factory;
    }

    public function novo(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $novaEntidade = $this->factory->criarEntidade($dadosRequest);

        $this->entityManager->persist($novaEntidade);
        $this->entityManager->flush();

        return new JsonResponse($novaEntidade);
    }

    public function buscarTodos(): Response
    {
        $listEntidade = $this->repository->findAll();

        return new JsonResponse($listEntidade);

    }

    public function buscarPorId(int $id): Response
    {
        $entidade = $this->repository->find( $id);

        return new JsonResponse($entidade);
    }

    public function atualiza(int $id, Request $request):Response
    {
        $corpoRequisicao = $request->getContent();
        $entidadeEnviada = $this->factory->criarEntidade($corpoRequisicao);
        $entidadeExistente = $this->repository->find($id);

        if(is_null($entidadeExistente)){
            return new Response("", Response::HTTP_NOT_FOUND);
        }

        $this->atualizarEntidadeExistente($entidadeEnviada,$entidadeExistente);

        $this->entityManager->flush();

        return new JsonResponse($entidadeExistente);
    }

    public function remover(int $id):Response
    {
        $entidade = $this->repository->find($id);

        $this->entityManager->remove($entidade);
        $this->entityManager->flush();

        return new JsonResponse("",Response::HTTP_NO_CONTENT);
    }

    abstract public function atualizarEntidadeExistente($entidadeEnviada, $entidadeExistente);
}