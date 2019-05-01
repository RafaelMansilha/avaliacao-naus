<?php

namespace App\Form;

use App\Entity\Produto;
use App\Entity\SolicitacaoProduto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitacaoProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantidade', IntegerType::class)
            ->add('produto', EntityType::class, array(
                'class' => Produto::class,
                'choice_label' => "descricao"
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SolicitacaoProduto::class,
        ]);
    }

}
