<?php

namespace App\Form;

use App\Entity\Ficha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreRecluso')
            ->add('apellidoRecluso')
            ->add('delito')
            ->add('sentencia')
            ->add('infoAdicional')
            ->add('validez')
            ->add('estadoFicha')
            ->add('idVigilante')
            ->add('idCelda')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ficha::class,
        ]);
    }
}
