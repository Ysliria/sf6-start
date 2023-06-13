<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Movie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Movie title'
            ])
            ->add('poster', TextType::class, [
                'label' => 'Movie poster',
                'required' => false
            ])
            ->add('releasedAt', DateType::class, [
                'label' => 'Release date',
                'widget' => 'single_text',
                'input' => 'datetime_immutable'
            ])
            ->add('plot', TextType::class, [
                'label' => 'Synopsis'
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'required' => false
            ])
            ->add('genres', EntityType::class, [
                'label' => 'Genre',
                'class' => Genre::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
