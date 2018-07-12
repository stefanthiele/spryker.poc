<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business;

use Pyz\Zed\HelloSpryker\Business\Model\StringReader;
use Pyz\Zed\HelloSpryker\Business\Model\StringReverser;
use Pyz\Zed\HelloSpryker\HelloSprykerDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer getQueryContainer()
 */
class HelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\HelloSpryker\Business\Model\StringReverser
     */
    public function createStringReverser()
    {
        return new StringReverser();
    }

    /**
     * @return \Pyz\Zed\HelloSpryker\Business\Model\StringReader
     */
    public function createStringReader()
    {
        return new StringReader($this->getQueryContainer());
    }

    /**
     *
     * @return \Pyz\Zed\StringReverser\Business\StringReverserFacade
     */
    protected function getStringReverserFacade()
    {
        return $this->getProvidedDependency(HelloSprykerDependencyProvider::FACADE_STRING_REVERSER);
    }
}
