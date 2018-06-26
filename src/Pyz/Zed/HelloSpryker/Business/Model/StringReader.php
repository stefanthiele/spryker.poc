<?php
/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business\Model;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainerInterface;

class StringReader
{
    /**
     * @var HelloSprykerQueryContainerInterface
     */
    private $helloSprykerQueryContainer;

    /**
     * @param HelloSprykerQueryContainerInterface $helloSprykerQueryContainer
     */
    public function __construct(HelloSprykerQueryContainerInterface $helloSprykerQueryContainer)
    {
        $this->helloSprykerQueryContainer = $helloSprykerQueryContainer;
    }

    /**
     * @param int $id
     *
     * @return HelloSprykerTransfer
     */
    public function readString($id)
    {
        $helloSprykerEntity = $this->helloSprykerQueryContainer
            ->queryHelloSprykerById($id)
            ->findOne();

        $helloSprykerTransfer = new HelloSprykerTransfer();
        $helloSprykerTransfer->setReversedString($helloSprykerEntity->getReversedString());

        return $helloSprykerTransfer;
    }
}
