<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\StringReverserTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\StringReverser\Business\StringReverserBusinessFactory getFactory()
 */
class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\StringReverserTransfer $stringReverserTransfer
     *
     * @return \Generated\Shared\Transfer\StringReverserTransfer
     */
    public function reverseString(StringReverserTransfer $stringReverserTransfer)
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverse($stringReverserTransfer);
    }
}
