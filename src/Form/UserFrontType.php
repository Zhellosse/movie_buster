<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;



class UserFrontType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class,[
                'attr' => ['class' => 'pseudo'],
            ])
            ->add('email', TextType::class,[
                'attr' => ['class' => 'mail'],
            ])
            //->add('roles')
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'attr' => ['class' => 'password'],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                ],
                'label_format' => 'Mot de passe',
            
            ])
            ->add('sex', ChoiceType::class, [
                'choices' => [
                    'Sexe' => [
                        'Homme' => 'Homme',
                        'Femme' => 'Femme',
                    ]
                    ],
                'attr' => ['class' => 'sexe'],
                'label_format' => 'Sexe',
             ])
            ->add('birth_date', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ],
                'attr' => ['class' => 'birthday'],
                'label_format' => 'Date de naissance',
             ])
            ->add('avatar', FileType::class, ['label' => 'Avatar (JPG/PNG Files)', 
            'data_class' => null,
            'attr' => ['class' => 'avatarInput'],
            ])
            

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
