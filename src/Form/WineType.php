<?php

namespace App\Form;

use App\Entity\Appellation;
use App\Entity\Vineyard;
use App\Entity\Wine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vineyard', EntityType::class, [
                'class' => Vineyard::class,
                'choice_label' => 'vineyardappellation'
            ])
            ->add('appellation', EntityType::class, [
                'class' => Appellation::class,
                'choice_label' => 'name'
            ])
            ->add('year')
            ->add('color')
            ->add('price')
            ->add('picture')
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wine::class,
        ]);
    }
}
