<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use MainBundle\Entity\Chambre;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class HotelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nbrEtoile')
        ->add('villeHotel')
        ->add('chambre', CollectionType::class, [
            'entry_type' => ChambreType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
        ])
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Hotel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_hotel';
    }


}
