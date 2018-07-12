<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Plugin\Provider\CheckoutPageControllerProvider;
use Pyz\Yves\CheckoutPage\Process\Steps\VoucherStep;
use Spryker\Yves\StepEngine\Process\StepCollection;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerShopStepFactory;
use SprykerShop\Yves\HomePage\Plugin\Provider\HomePageControllerProvider;

class StepFactory extends SprykerShopStepFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Process\StepCollectionInterface
     */
    public function createStepCollection()
    {
        $stepCollection = new StepCollection(
            $this->getUrlGenerator(),
            CheckoutPageControllerProvider::CHECKOUT_ERROR
        );

        $stepCollection
            ->addStep($this->createEntryStep())
            ->addStep($this->createCustomerStep())
            ->addStep($this->createAddressStep())
            ->addStep($this->createShipmentStep())
            ->addStep($this->createPaymentStep())
            ->addStep($this->createVoucherStep())
            ->addStep($this->createSummaryStep())
            ->addStep($this->createPlaceOrderStep())
            ->addStep($this->createSuccessStep());

        return $stepCollection;
    }

    /**
     * @return \Pyz\Yves\CheckoutPage\Process\Steps\VoucherStep
     */
    public function createVoucherStep()
    {
        return new VoucherStep(
            $this->getCalculationClient(),
            CheckoutPageControllerProvider::CHECKOUT_VOUCHER,
            HomePageControllerProvider::ROUTE_HOME
        );
    }
}
