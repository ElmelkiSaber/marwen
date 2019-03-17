<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nomClient')
        ->add('prenomClient')
        ->add('telClient')
        ->add('addresseClient')
        ->add('ville')
        ->add('emailClient')
       /* ->add('offreVoyage', EntityType::class, [
            // looks for choices from this entity
            'class' => 'MainBundle:OffreVoyage',
        
            // uses the User.username property as the visible option string
            'choice_label' => 'id',
        
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ])*/
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_client';
    }


}
