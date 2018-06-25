<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringReverser\Business;

use Pyz\Zed\HelloSpryker\Business\Model\StringReader;
use Pyz\Zed\HelloSpryker\Business\Model\StringReverser;
use Pyz\Zed\HelloSpryker\HelloSprykerDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer getQueryContainer()
 */
class StringReverserBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return StringReverser
     */
    public function createStringReverser()
    {
        return new StringReverser();
    }
}
