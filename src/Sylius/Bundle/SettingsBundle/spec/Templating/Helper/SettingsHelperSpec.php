<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\SettingsBundle\Templating\Helper;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\SettingsBundle\Manager\SettingsManagerInterface;
use Sylius\Bundle\SettingsBundle\Model\Settings;
use Symfony\Component\Templating\Helper\Helper;

class SettingsHelperSpec extends ObjectBehavior
{
    function let(SettingsManagerInterface $settingsManager)
    {
        $this->beConstructedWith($settingsManager);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\SettingsBundle\Templating\Helper\SettingsHelper');
    }

    function it_should_be_a_Twig_extension()
    {
        $this->shouldHaveType(Helper::class);
    }

    function it_should_return_settings_by_namespace($settingsManager, Settings $settings)
    {
        $settingsManager->loadSettings('sylius_taxation')->shouldBeCalled()->willReturn($settings);

        $this->getSettings('sylius_taxation')->shouldReturn($settings);
    }

    function it_should_return_settings_parameter_by_namespace_and_name(
        SettingsManagerInterface$settingsManager,
        Settings $settings
    ) {
        $settingsManager->loadSettings('sylius_shipping')->shouldBeCalled()->willReturn($settings);
        $settings->get('price')->shouldBeCalled()->willReturn(19.99);

        $this->getSettingsParameter('sylius_shipping.price')->shouldReturn(19.99);
    }
}
