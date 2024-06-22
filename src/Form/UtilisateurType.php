<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('nom', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email([
                        'message' => "L'email '{{ value }}' n'est pas un email valide.",
                        'mode' => 'html5',
                    ]),
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe'],
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit comporter au moins {{ limit }} caractères.',
                    ]),
                    new Assert\Regex([
                        'pattern' => '/[a-z]/',
                        'message' => 'Le mot de passe doit contenir au moins une lettre.',
                    ]),
                    new Assert\Regex([
                        'pattern' => '/[0-9]/',
                        'message' => 'Le mot de passe doit contenir au moins un chiffre.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
