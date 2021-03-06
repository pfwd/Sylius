<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ShippingBundle\Form\Type\Calculator;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class WeightRateConfigurationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fixed', 'sylius_money', array(
                'label' => 'sylius.form.shipping_calculator.weight_rate_configuration.fixed',
                'constraints' => array(
                    new NotBlank(),
                    new Type(array('type' => 'integer')),
                ),
            ))
            ->add('variable', 'sylius_money', array(
                'label' => 'sylius.form.shipping_calculator.weight_rate_configuration.variable',
                'constraints' => array(
                    new NotBlank(),
                    new Type(array('type' => 'integer')),
                ),
            ))
            ->add('division', 'number', array(
                'label' => 'sylius.form.shipping_calculator.weight_rate_configuration.division',
                'constraints' => array(
                    new NotBlank(),
                    new Type(array('type' => 'numeric')),
                ),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => null,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_shipping_calculator_weight_rate';
    }
}
