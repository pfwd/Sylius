<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\OrderBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Order\Model\AdjustmentInterface;
use Sylius\Component\Order\Model\CommentInterface;
use Sylius\Component\Order\Model\IdentityInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Model\OrderItemInterface;

/**
 * Sales order management bundle.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class SyliusOrderBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelInterfaces()
    {
        return array(
            AdjustmentInterface::class => 'sylius.model.adjustment.class',
            CommentInterface::class    => 'sylius.model.comment.class',
            OrderInterface::class      => 'sylius.model.order.class',
            OrderItemInterface::class  => 'sylius.model.order_item.class',
            IdentityInterface::class   => 'sylius.model.order_identity.class',

        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Sylius\Component\Order\Model';
    }
}
