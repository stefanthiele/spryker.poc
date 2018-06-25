<?php
/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business\Model;


use Generated\Shared\Transfer\HelloSprykerTransfer;
use Orm\Zed\HelloSpryker\Persistence\PyzHelloSpryker;

class StringReverser
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer)
    {
        $reversedString = strrev($helloSprykerTransfer->getOriginalString());
        $helloSprykerTransfer->setReversedString($reversedString);

        $this->saveReversedString($helloSprykerTransfer);

        return $helloSprykerTransfer;
    }

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function saveReversedString(HelloSprykerTransfer $helloSprykerTransfer)
    {
        $helloSprykerEntity = new PyzHelloSpryker();

        $helloSprykerEntity->setReversedString($helloSprykerTransfer->getReversedString())->save();
    }
}
