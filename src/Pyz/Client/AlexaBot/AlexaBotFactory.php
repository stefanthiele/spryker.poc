<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Pyz\Client\AlexaBot\Model\Cart\AlexaCart;
use Pyz\Client\AlexaBot\Model\CheckoutAndOrder\AlexaCheckoutAndOrder;
use Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator;
use Pyz\Client\AlexaBot\Model\FileSession\FileSession;
use Pyz\Client\AlexaBot\Model\Product\AlexaProduct;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\AlexaBot\AlexaBotConfig getConfig()
 */
class AlexaBotFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\AlexaBot\Model\Product\AlexaProduct
     */
    public function createAlexaProduct()
    {
        return new AlexaProduct(
            $this->getConfig(),
            $this->getCatalogClient(),
            // TODO Product-1: inject the product storage client using a method from this factory.
            $this->createFileSession()
        );
    }

    /**
     * @return \Pyz\Client\AlexaBot\Model\Cart\AlexaCart
     */
    public function createAlexaCart()
    {
        return new AlexaCart(
            $this->getConfig(),
            $this->getCartClient(),
            $this->createAlexaProduct(),
            $this->createFileSession()
        );
    }

    /**
     * @return \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\AlexaCheckoutAndOrder
     */
    public function createAlexaCheckoutAndOrder()
    {
        return new AlexaCheckoutAndOrder(
            $this->getConfig(),
            $this->getCheckoutClient(),
            $this->getCalculationClient(),
            $this->createOrderHydrator(),
            $this->createFileSession()
        );
    }

    /**
     * @return \Pyz\Client\AlexaBot\Model\FileSession\FileSession
     */
    public function createFileSession()
    {
        return new FileSession();
    }

    /**
     * @return \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator
     */
    public function createOrderHydrator()
    {
        return new OrderHydrator();
    }

    /**
     * @return \Spryker\Client\Catalog\CatalogClientInterface
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @return \Spryker\Client\ProductStorage\ProductStorageClientInterface
     */
    public function getProductStorageClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Client\Checkout\CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CHECKOUT);
    }

    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    public function getCalculationClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_CALCULATION);
    }
}
