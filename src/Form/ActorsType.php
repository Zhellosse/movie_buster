<?php

namespace App\Form;

use App\Entity\Actors;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;



class ActorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', null,[
                'label_format' => 'Prénom',
            ])
            ->add('last_name', null,[
                'label_format' => 'Nom',
            ])
            ->add('birth_date', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ],
                'label_format' => 'Date de naissance',
             ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actors::class,
        ]);
    }
}
