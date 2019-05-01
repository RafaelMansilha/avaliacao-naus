<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SolicitacaoRepository")
 */
class Solicitacao
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SolicitacaoProduto", mappedBy="solicitacao", orphanRemoval=true, cascade={"persist"})
     */
    private $ListaDeProdutos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Solicitante;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataDeCriacao;

    /** @ORM\Column(type="string", nullable=true) */
    private $marking;

    /**
     * @return mixed
     */
    public function getMarking()
    {
        return $this->marking;
    }

    /**
     * @param mixed $marking
     */
    public function setMarking($marking): void
    {
        $this->marking = $marking;
    }

    public function __construct()
    {
        $this->ListaDeProdutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|SolicitacaoProduto[]
     */
    public function getListaDeProdutos(): Collection
    {
        return $this->ListaDeProdutos;
    }

    public function addListaDeProduto(SolicitacaoProduto $listaDeProduto): self
    {
        if (!$this->ListaDeProdutos->contains($listaDeProduto)) {
            $this->ListaDeProdutos[] = $listaDeProduto;
            $listaDeProduto->setSolicitacao($this);
        }

        return $this;
    }

    public function removeListaDeProduto(SolicitacaoProduto $listaDeProduto): self
    {
        if ($this->ListaDeProdutos->contains($listaDeProduto)) {
            $this->ListaDeProdutos->removeElement($listaDeProduto);
            // set the owning side to null (unless already changed)
            if ($listaDeProduto->getSolicitacao() === $this) {
                $listaDeProduto->setSolicitacao(null);
            }
        }

        return $this;
    }

    public function getSolicitante(): ?User
    {
        return $this->Solicitante;
    }

    public function setSolicitante(?User $Solicitante): self
    {
        $this->Solicitante = $Solicitante;

        return $this;
    }

    public function getDataDeCriacao(): ?\DateTimeInterface
    {
        return $this->dataDeCriacao;
    }

    public function setDataDeCriacao(\DateTimeInterface $dataDeCriacao): self
    {
        $this->dataDeCriacao = $dataDeCriacao;

        return $this;
    }
}
