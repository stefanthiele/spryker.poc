<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringReverser\Business\Model;

use Generated\Shared\Transfer\StringReverserTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

class StringReverser extends AbstractFacade
{
    /**
     * @param \Generated\Shared\Transfer\StringReverserTransfer $stringReverserTransfer
     *
     * @return \Generated\Shared\Transfer\StringReverserTransfer
     */
    public function reverse(StringReverserTransfer $stringReverserTransfer)
    {
        $reversedString = strrev($stringReverserTransfer->getOriginalString());
        $stringReverserTransfer->setReversedString($reversedString);

        return $stringReverserTransfer;
    }
}
