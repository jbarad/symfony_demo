<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaxType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('lastname', 'text')
            ->add('tipodoc', 'choice', array(
                'choices' => array(
                    'DNI' => 'DNI',
                    'Pasaporte' => 'Pasaporte',
                ),
            ))
            ->add('dni', 'text')
            ->add('diafechanac', 'choice', array(
                'choices' => array_combine(range(1,31),range(1,31)),
                'empty_value' => 'Día',
            ))
            ->add('mesfechanac', 'choice', array(
                'choices' => array_combine(range(1,12),range(1,12)),
                'empty_value' => 'Mes',
            ))
            ->add('aniofechanac', 'choice', array(
                'choices' => array_combine(range(date("Y")-17,1920),range(date("Y")-17,1920)),
                'empty_value' => 'Año',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        // Best Practice: use 'app_' as the prefix of your custom form types names
        // see http://symfony.com/doc/current/best_practices/forms.html#custom-form-field-types
        return 'app_pax';
    }
}
