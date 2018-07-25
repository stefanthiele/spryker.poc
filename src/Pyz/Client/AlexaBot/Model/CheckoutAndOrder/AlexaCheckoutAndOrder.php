<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\CheckoutAndOrder;

use Pyz\Client\AlexaBot\AlexaBotConfig;
use Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;

class AlexaCheckoutAndOrder implements AlexaCheckoutAndOrderInterface
{
    /**
     * @var \Pyz\Client\AlexaBot\AlexaBotConfig
     */
    private $alexaBotConfig;

    /**
     * @var CheckoutClientInterface
     */

    private $checkoutClient;

    /**
     * @var \Spryker\Client\Calculation\CalculationClientInterface
     */
    private $calculationClient;

    /**
     * @var \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator
     */
    private $orderHydrator;

    /**
     * @var \Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface
     */
    private $fileSession;

    /**
     * @param \Pyz\Client\AlexaBot\AlexaBotConfig $alexaBotConfig
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator $orderHydrator
     * @param \Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface $fileSession
     */
    public function __construct(
        AlexaBotConfig $alexaBotConfig,
        CheckoutClientInterface $checkoutClient,
        CalculationClientInterface $calculationClient,
        OrderHydrator $orderHydrator,
        FileSessionInterface $fileSession
    ) {
        $this->checkoutClient = $checkoutClient;
        $this->calculationClient = $calculationClient;
        $this->alexaBotConfig = $alexaBotConfig;
        $this->fileSession = $fileSession;
        $this->orderHydrator = $orderHydrator;
    }

    /**
     * @return bool
     */
    public function checkoutAndPlaceOrder()
    {
        $quoteTransfer = $this->checkout();
        $checkoutClient = $this->placeOrder($quoteTransfer);

        if ($checkoutClient->getIsSuccess()) {
            $this->fileSession->delete($this->alexaBotConfig->getCartSessionName());
            return true;
        }

        return false;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function checkout()
    {
        $quoteTransfer = $this->getQuoteTransferFromSession();
        $quoteTransfer = $this->HydrateQuoteTransfer($quoteTransfer);
        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    private function placeOrder($quoteTransfer)
    {
        $checkoutClient = null; // TODO CheckoutAndOrder-3: call the placeOrder() method from the CheckoutClient to place the order.

        return $checkoutClient;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function getQuoteTransferFromSession()
    {
        return unserialize(
            $this->fileSession->read($this->alexaBotConfig->getCartSessionName())
        );
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function HydrateQuoteTransfer($quoteTransfer)
    {
        // TODO CheckoutAndOrder-2: hydrate the quoteTransfer with customer, address, shipment, and payment data using the OrderHydrator.
        $quoteTransfer = null;
        $quoteTransfer->setCheckoutConfirmed(true);

        return $quoteTransfer;
    }
}
