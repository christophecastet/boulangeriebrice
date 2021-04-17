<?php

namespace App\Form;

use App\Entity\Allergene;
use App\Entity\Produit;
use App\Entity\Famille;
use App\Entity\Magasin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null,  [
                'attr'=> [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('designation', TextareaType::class, array(
                'label' => 'Désignation ',
                'attr' => array(
                    'placeholder' => 'Désignation',
                )
           ))
            ->add('imageFile', FileType::class, array(
                'required'=>false,
                'label'=> 'Photo',
                    

            ) )
         
            ->add('famille', EntityType::class, [
                'class'=>Famille::class,
                'choice_label'=>'type',
                'expanded'=>false,
                'multiple'=>false
            ])
                
            ->add('allergene', EntityType::class, [
                'class'=>Allergene::class,
                'choice_label'=>'type',
                'expanded'=>true,
                'multiple'=>true
            ])

            ->add('magasin' ,EntityType::class, [
                'class'=>Magasin::class,
                'choice_label'=>'nom',
                'expanded'=>true,
                'multiple'=>true

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
