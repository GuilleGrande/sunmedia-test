<?php

namespace AppBundle\Form;

use AppBundle\Entity\Creative;
use AppBundle\Repository\CreativeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PublisherType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('relatedCreatives', EntityType::class, [
                'placeholder' => 'Choose an ad creative to manage',
                'class' => Creative::class,
                'query_builder' => function(CreativeRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Publisher'
        ));
    }

    public function getBlockPrefix()
    {
        return 'appbundle_publisher';
    }


}
