<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class UserLoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Votre adresse email',
                    'class' => 'input-style' // Ajoutez ici vos classes CSS personnalisées si besoin
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez saisir votre adresse email.',
                    ]),
                    new Assert\Email([
                        'message' => "L'email '{{ value }}' n'est pas un email valide.",
                        'mode' => 'html5',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Votre mot de passe',
                    'class' => 'input-style' // Ajoutez ici vos classes CSS personnalisées si besoin
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez saisir votre mot de passe.',
                    ])
                ],
            ]);
        }
    }

