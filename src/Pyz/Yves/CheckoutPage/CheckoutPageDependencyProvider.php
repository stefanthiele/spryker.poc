<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage;

use Generated\Shared\Transfer\PaymentTransfer;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use SprykerEco\Yves\Payone\Plugin\PayoneCreditCardSubFormPlugin;
use SprykerEco\Yves\Payone\Plugin\PayoneDirectDebitSubFormPlugin;
use SprykerEco\Yves\Payone\Plugin\PayoneEpsOnlineTransferSubFormPlugin;
use SprykerEco\Yves\Payone\Plugin\PayoneEWalletSubFormPlugin;
use SprykerEco\Yves\Payone\Plugin\PayoneHandlerPlugin;
use SprykerEco\Yves\Payone\Plugin\PayoneInvoiceSubFormPlugin;
use SprykerEco\Yves\Payone\Plugin\PayonePrePaymentSubFormPlugin;
use SprykerShop\Yves\CartNoteWidget\Plugin\CheckoutPage\CartNoteQuoteItemNoteWidgetPlugin;
use SprykerShop\Yves\CartNoteWidget\Plugin\CheckoutPage\CartNoteQuoteNoteWidgetPlugin;
use SprykerShop\Yves\CheckoutPage\CheckoutPageDependencyProvider as SprykerShopCheckoutPageDependencyProvider;
use SprykerShop\Yves\CustomerPage\Form\CheckoutAddressCollectionForm;
use SprykerShop\Yves\CustomerPage\Form\CustomerCheckoutForm;
use SprykerShop\Yves\CustomerPage\Form\DataProvider\CheckoutAddressFormDataProvider;
use SprykerShop\Yves\CustomerPage\Form\GuestForm;
use SprykerShop\Yves\CustomerPage\Form\LoginForm;
use SprykerShop\Yves\CustomerPage\Form\RegisterForm;
use SprykerShop\Yves\DiscountWidget\Plugin\CheckoutPage\CheckoutVoucherFormWidgetPlugin;

class CheckoutPageDependencyProvider extends SprykerShopCheckoutPageDependencyProvider
{
    /**
     * @return string[]
     */
    protected function getSummaryPageWidgetPlugins(): array
    {
        return [
            CheckoutVoucherFormWidgetPlugin::class,
            CartNoteQuoteItemNoteWidgetPlugin::class, #CartNoteFeature
            CartNoteQuoteNoteWidgetPlugin::class, #CartNoteFeature
        ];
    }

    /**
     * @return mixed[]
     */
    protected function getCustomerStepSubForms()
    {
        return [
            LoginForm::class,
            $this->getCustomerCheckoutForm(RegisterForm::class, RegisterForm::BLOCK_PREFIX),
            $this->getCustomerCheckoutForm(GuestForm::class, GuestForm::BLOCK_PREFIX),
        ];
    }

    /**
     * @return mixed[]
     */
    protected function getCustomerFormTypes()
    {
        return [
            LoginForm::class,
            $this->getCustomerCheckoutForm(RegisterForm::class, RegisterForm::BLOCK_PREFIX),
            $this->getCustomerCheckoutForm(GuestForm::class, GuestForm::BLOCK_PREFIX),
        ];
    }

    /**
     * @param string $subForm
     * @param string $blockPrefix
     *
     * @return \SprykerShop\Yves\CustomerPage\Form\CustomerCheckoutForm|\Symfony\Component\Form\FormInterface
     */
    protected function getCustomerCheckoutForm($subForm, $blockPrefix)
    {
        return $this->getFormFactory()->createNamed(
            $blockPrefix,
            CustomerCheckoutForm::class,
            null,
            [CustomerCheckoutForm::SUB_FORM_CUSTOMER => $subForm]
        );
    }

    /**
     * @return \Symfony\Component\Form\FormFactory
     */
    private function getFormFactory()
    {
        return (new Pimple())->getApplication()['form.factory'];
    }

    /**
     * @return string[]
     */
    protected function getAddressStepSubForms()
    {
        return [
            CheckoutAddressCollectionForm::class,
        ];
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface|null
     */
    protected function getAddressStepFormDataProvider(Container $container)
    {
        return new CheckoutAddressFormDataProvider($this->getCustomerClient($container), $this->getStore());
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addPaymentMethodHandlerPluginCollection(Container $container): Container
    {
        $container[self::PAYMENT_METHOD_HANDLER] = function () {
            $paymentMethodHandler = new StepHandlerPluginCollection();

            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_INVOICE);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_CREDIT_CARD);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_DIRECT_DEBIT);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_E_WALLET);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_ONLINE_TRANSFER);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_PRE_PAYMENT);
            $paymentMethodHandler->add(new PayoneHandlerPlugin(), PaymentTransfer::PAYONE_PAYPAL_EXPRESS_CHECKOUT);

            return $paymentMethodHandler;
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addSubFormPluginCollection(Container $container): Container
    {
        $container[self::PAYMENT_SUB_FORMS] = function () {
            $paymentSubFormPlugin = new SubFormPluginCollection();

            $paymentSubFormPlugin->add(new PayoneInvoiceSubFormPlugin());
            $paymentSubFormPlugin->add(new PayoneCreditCardSubFormPlugin());
            $paymentSubFormPlugin->add(new PayoneDirectDebitSubFormPlugin());
            $paymentSubFormPlugin->add(new PayoneEWalletSubFormPlugin());
            $paymentSubFormPlugin->add(new PayoneEpsOnlineTransferSubFormPlugin());
            $paymentSubFormPlugin->add(new PayonePrePaymentSubFormPlugin());

            return $paymentSubFormPlugin;
        };

        return $container;
    }
}
