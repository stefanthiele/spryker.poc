<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Spryker\Client\Kernel\AbstractBundleConfig;

class AlexaBotConfig extends AbstractBundleConfig
{
    const SESSION_NAME_PRODUCT = 'alexa-product.session';
    const SESSION_NAME_CART = 'alexa-cart.session';

    /**
     * @return string
     */
    public function getProductSessionName()
    {
        return static::SESSION_NAME_PRODUCT;
    }

    /**
     * @return string
     */
    public function getCartSessionName()
    {
        return static::SESSION_NAME_CART;
    }
}
