<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Internal\TentativeType;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomeCompleto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $senha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeCompleto(): ?string
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto(string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id"=>$this->getId(),
            "nomeCompleto"=>$this->getNomeCompleto(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha()
        ];
    }
}
