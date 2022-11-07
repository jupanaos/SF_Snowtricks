<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path', FileType::class, [
                'label' => 'Image (jpg/png)',
                'mapped' => false,
                // make it optional so you don't have to re-upload the img file on each edit
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une image',
                    ]),
                    new File([
                        'maxSize' => '2048k',
                        'maxSizeMessage' => 'Votre fichier est trop lourd ({{ size }} {{ suffix }}). Le poids maximum autorisé est de {{ limit }} {{ suffix }}.',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Votre image doit être au format jpeg ou png.',
                    ]),
                    new Image([
                        'allowPortrait' => false,
                        'allowPortraitMessage' => 'Votre image doit être au format paysage.',
                    ]),
                ],
            ])
            ->add('caption', TextType::class, [
                'label' => 'Légende',
                'attr' => [
                    'placeholder' => "Entrer une description"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une légende.'
                    ]),
                    new Length([
                        'max' => 150,
                        'maxMessage' => 'La légende de l\'image ne doit pas contenir plus de {{ limit }} caractères.'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
