<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\CoreBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ShippingBundle\Form\Type\ShippingMethodType;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Symfony\Component\Form\FormRegistryInterface;
use Symfony\Component\Form\FormTypeInterface;

class ShippingMethodTypeSpec extends ObjectBehavior
{
    function let(ServiceRegistryInterface $calculatorRegistry, ServiceRegistryInterface $checkerRegistry, FormRegistryInterface $formRegistry)
    {
        $this->beConstructedWith('ShippingMethod', array('sylius'), $calculatorRegistry, $checkerRegistry, $formRegistry);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\CoreBundle\Form\Type\ShippingMethodType');
    }

    function it_should_be_a_form_type()
    {
        $this->shouldImplement(FormTypeInterface::class);
    }

    function it_should_extend_Sylius_shipping_method_form_type()
    {
        $this->shouldHaveType(ShippingMethodType::class);
    }
}
