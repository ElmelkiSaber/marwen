<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use MainBundle\Form\ClientType;

class OffreVoyageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('prixOffre')
        ->add('nbrPlaceOffre')
        ->add('client', CollectionType::class, [
            'entry_type' => ClientType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
        ])
        ->add('transport', CollectionType::class, [
            'entry_type' => TransportType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
        ])
        ->add('hotel', CollectionType::class, [
            'entry_type' => HotelType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
        ])
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\OffreVoyage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_offrevoyage';
    }


}
