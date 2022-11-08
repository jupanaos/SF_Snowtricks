<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un pseudo.',
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un email.',
                    ]),
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'attr' => ['autocomplete' => 'password'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer un mot de passe',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'label' => 'Mot de passe',
                ],
                'second_options' => [
                    'attr' => ['autocomplete' => 'password'],
                    'label' => 'Confirmer le mot de passe',
                ],
                'invalid_message' => 'Les mots de passe entrés ne sont pas les mêmes.',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
            ->add('avatar', FileType::class, [
                'label' => 'Avatar (jpg/png)',
                'mapped' => false,
                // make it optional so you don't have to re-upload the img file on each edit
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une image',
                    ]),
                    new File([
                        'maxSize' => '1024k',
                        'maxSizeMessage' => 'Votre fichier est trop lourd ({{ size }} {{ suffix }}). Le poids maximum autorisé est de {{ limit }} {{ suffix }}.',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Votre image doit être au format jpeg ou png.',
                    ]),
                    new Image([
                        'allowLandscape' => false,
                        'allowPortrait' => false,
                        'allowPortraitMessage' => 'Votre image doit être à un format carré.',
                        'allowLandscapeMessage' => 'Votre image doit être à un format carré.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
