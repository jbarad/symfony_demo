<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate paquetes.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PaqueteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // For the full reference of options defined by each form field type
        // see http://symfony.com/doc/current/reference/forms/types.html

        // By default, form fields include the 'required' attribute, which enables
        // the client-side form validation. This means that you can't test the
        // server-side validation errors from the browser. To temporarily disable
        // this validation, set the 'required' attribute to 'false':
        //
        //     $builder->add('title', null, array('required' => false, ...));

        $builder
            ->add('titulo', null, array(
                'attr' => array('autofocus' => true),
                'label' => 'paquete.label.titulo',
            ))
            ->add('descripcionCortaTitulo', null, array(
                'label' => 'paquete.label.descripcionCortaTitulo',
            ))
            ->add('descripcionCortaTexto', 'textarea', array(
                'attr' => array('rows' => 5),
                'label' => 'paquete.label.descripcionCortaTexto',
            ))
            ->add('descripcionLargaTitulo', null, array(
                'label' => 'paquete.label.descripcionLargaTitulo',
            ))
            ->add('bullets', 'collection', array(
                'label' => 'paquete.label.descripcionLargaBullets',
                'type' => new BulletType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))
            ->add('salidasTitulo', null, array(
                'label' => 'paquete.label.salidasTitulo',
            ))
            ->add('salidasTexto', 'textarea', array(
                'attr' => array('rows' => 5),
                'label' => 'paquete.label.salidasTexto',
            ))
            ->add('legalesTitulo', null, array(
                'label' => 'paquete.label.legalesTitulo',
            ))
            ->add('legalesTexto', 'textarea', array(
                'attr' => array('rows' => 5),
                'label' => 'paquete.label.legalesTexto',
            ))
            ->add('validoDesde', 'app_datetimepicker', array(
                'label' => 'paquete.label.validoDesde',
            ))
            ->add('validoHasta', 'app_datetimepicker', array(
                'label' => 'paquete.label.validoHasta',
            ))
            ->add('pasajeros', 'choice', array(
                'choices' => array_combine(range(1,10),range(1,10)),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('moneda', 'choice', array(
                'choices' => array(
                    'ARS' => 'Pesos',
                    'USD' => 'Dólares',
                ),
            ))
            ->add('formaVenta', 'choice', array(
                'choices' => array(
                    '0' => 'Vender por beneficio',
                    '1' => 'Vender por pasajero',
                ),
                'expanded' => true,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Paquete',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        // Best Practice: use 'app_' as the prefix of your custom form types names
        // see http://symfony.com/doc/current/best_practices/forms.html#custom-form-field-types
        return 'app_paquete';
    }
}
