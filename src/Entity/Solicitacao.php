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
     * @ORM\OneToMany(targetEntity="App\Entity\SolicitacaoProduto", mappedBy="solicitacao", orphanRemoval=true)
     */
    private $ListaDeProdutos;

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
}
