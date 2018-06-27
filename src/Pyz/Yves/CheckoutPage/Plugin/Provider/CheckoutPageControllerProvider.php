<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\CheckoutPage\Plugin\Provider\CheckoutPageControllerProvider as SprykerShopCheckoutPageControllerProvider;

class CheckoutPageControllerProvider extends SprykerShopCheckoutPageControllerProvider
{
    const CHECKOUT_VOUCHER = 'checkout-voucher';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->addCheckoutIndexRoute()
            ->addCustomerStepRoute()
            ->addAddressStepRoute()
            ->addShipmentStepRoute()
            ->addVoucherStepRoute()
            ->addPaymentStepRoute()
            ->addCheckoutSummaryStepRoute()
            ->addPlaceOrderStepRoute()
            ->addCheckoutErrorRoute()
            ->addCheckoutSuccessRoute();
    }

    /**
     * @return $this
     */
    protected function addVoucherStepRoute(): self
    {
        $this->createController('/{checkout}/voucher', self::CHECKOUT_VOUCHER, 'CheckoutPage', 'Checkout', 'voucher')
            ->assert('checkout', $this->getAllowedLocalesPattern() . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        return $this;
    }
}
