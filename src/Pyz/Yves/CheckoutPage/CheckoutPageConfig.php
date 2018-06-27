<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage;

use SprykerShop\Yves\CheckoutPage\CheckoutPageConfig as SprykerShopCheckoutPageConfig;

class CheckoutPageConfig extends SprykerShopCheckoutPageConfig
{
    /**
     * @return bool
     */
    public function cleanCartAfterOrderCreation()
    {
        return false;
    }
}
