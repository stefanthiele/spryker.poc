<?php
/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\VoucherForm;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerShopFormFactory;

class FormFactory extends SprykerShopFormFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createVoucherFormCollection()
    {
        return $this->createFormCollection($this->getVoucherFormTypes());
    }

    /**
     * @return string[]
     */
    public function getVoucherFormTypes()
    {
        return [
            $this->getVoucherForm(),
        ];
    }

    /**
     * @return string
     */
    public function getVoucherForm()
    {
        return VoucherForm::class;
    }
}
