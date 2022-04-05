<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use http\QueryString;
use JetBrains\PhpStorm\Internal\TentativeType;

/**
 * @ORM\Entity(repositoryClass=EspecialidadeRepository::class)
 */
class Profissional implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $crm;
    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity=especialidade::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $especialidade;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrm(): ?int
    {
        return $this->crm;
    }

    public function setCrm(int $crm): self
    {
        $this->crm = $crm;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }


    public function getEspecialidade(): ?especialidade
    {
        return $this->especialidade;
    }

    public function setEspecialidade(?especialidade $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }

    public function jsonSerialize()
    {
        return[
            "id"=>$this->getId(),
            "crm"=>$this->getCrm(),
            "nome"=>$this->getNome(),
            "especialidadeId"=>$this->getEspecialidade()->getId()
        ];
    }
}