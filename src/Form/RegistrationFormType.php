<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pseudo')
        ->add('nom', TextType::class, [
            'label' => 'Votre nom',
            'attr' => [
                'placeholder' => 'Merci de saisir votre nom'
            ]
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Votre prénom',
            'attr' => [
                'placeholder' => 'Merci de saisir votre prénom'
            ]
            ])
        ->add('civilite', ChoiceType::class, [
            'choices' => [
                'Homme' => 'Homme',
                'Femme' => 'Femme',
                'Autre' => 'Autre'
            ]
        ])

         //->add('dateEnregistrement')

        ->add('email', EmailType::class, [
            'label' => 'Votre email',
            'attr' => [
                'placeholder' => 'Merci de saisir votre adresse email'
            ]
        ])
       
    ->add('plainPassword', RepeatedType::class, [
        'type' => PasswordType::class,
        'first_options' => ['label' => 'Mot de passe'],
        'second_options' => ['label' => 'Confirmez votre mot de passe'],
        'mapped' => false,
        'attr' => ['autocomplete' => 'new-password'],
        'constraints' => [
            new NotBlank([
                'message' => 'Veuillez saisir un mot de passe',
            ]),
            new Length([
                'min' => 6,
                'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                // max length allowed by Symfony for security reasons
                'max' => 4096,
            ]),
        ],
    ])


        ->add('submit', SubmitType::class, [
            'label' => "S'inscrire"
        ])
        ->setMethod('POST')
       
    ;
}



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
