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
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('release_date', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ],
                'label_format' => 'Date de sortie',
             ])
            ->add('classification',null,[
                'label_format' => 'Classification',
            ])
            ->add('director',null,[
                'label_format' => 'Réalisateur',
            ])
            ->add('duree',null,[
                'label_format' => 'Durée',
            ])
            ->add('country',null,[
                'label_format' => 'Nationalité',
            ])
            ->add('genre', EntityType::class, [
                // looks for choices from this entity
                'class' => Genre::class,
                'label_format' => 'Genre',
                // uses the User.username property as the visible option string
                'choice_label' => 'name',
                'translation_domain' => 'Default',
                    'required' => true,
                    'expanded'=> true,
                    'multiple' => true,
                ])
                ->add('actors', EntityType::class, array(
                    'class'        => Actors::class,
                    'label_format' => 'Acteurs',
                    'choice_label' => function (Actors $actor) {
                        return $actor->getFirstname() . ' ' . $actor->getLastname();
                    },
                    'multiple'     => true,
                    'required' => true,
                    'expanded'=> true,
                    
                  ))
                
            ->add('synopsis',null,[
                'label_format' => 'Synopsis',
            ])
            ->add('affiche', FileType::class, ['label' => 'Affiche (JPG/PNG Files)', 'data_class' => null])
            ->add('trailer',null,[
                'label_format' => 'Bande-annonce',
            ])
       
            
            
            

            //->add('actors', EntityType::class, [
                // looks for choices from this entity
                //'class' => Actors::class,
               // 'choice_label' => function (Actors $actor) {
                   // return $actor->getFirstname() . ' ' . $actor->getLastname();
               // },
               // 'translation_domain' => 'Default',
                  //  'required' => false,
                  //  'expanded'=> false,
                 //   'multiple' => true,
                
          //  ])
            
       // ;
;
 
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
