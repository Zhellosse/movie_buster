<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('release_date')
            ->add('classification')
            ->add('synopsis')
            ->add('affiche')
            ->add('trailer')
            ->add('director')
            ->add('duree')
            ->add('country')
            ->add('title')
            ->add('actors')
            ->add('genre')
            ->add('note')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
