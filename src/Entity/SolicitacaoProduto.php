<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SolicitacaoProdutoRepository")
 */
class SolicitacaoProduto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produto;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantidade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Solicitacao", inversedBy="ListaDeProdutos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitacao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduto(): ?Produto
    {
        return $this->produto;
    }

    public function setProduto(?Produto $produto): self
    {
        $this->produto = $produto;

        return $this;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getSolicitacao(): ?Solicitacao
    {
        return $this->solicitacao;
    }

    public function setSolicitacao(?Solicitacao $solicitacao): self
    {
        $this->solicitacao = $solicitacao;

        return $this;
    }
}
