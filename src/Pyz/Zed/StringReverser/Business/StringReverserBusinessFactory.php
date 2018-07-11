<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringReverser\Business;

use Pyz\Zed\StringReverser\Business\Model\StringReverser;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\StringReverser\StringReverserConfig getConfig()
 */
class StringReverserBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\StringReverser\Business\Model\StringReverser
     */
    public function createStringReverser()
    {
        return new StringReverser();
    }
}
