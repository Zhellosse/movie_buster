<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\Actors;
use App\Entity\Genre;
use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            ->add('genre', EntityType::class, [
                // looks for choices from this entity
                'class' => Genre::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'name',
                ])

            ->add('actors', EntityType::class, [
                // looks for choices from this entity
                'class' => Actors::class,
                'choice_label' => function (Actors $actor) {
                    return $actor->getFirstname() . ' ' . $actor->getLastname();
                }
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
