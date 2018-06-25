<?php

namespace Pyz\Client\HelloSpryker;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\HelloSpryker\HelloSprykerFactory getFactory()
 */
class HelloSprykerClient extends AbstractClient implements HelloSprykerClientInterface
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function reverseSting(HelloSprykerTransfer $helloSprykerTransfer)
    {
        return $this->getFactory()
            ->createZedHelloSprykerStub()
            ->reverseString($helloSprykerTransfer);
    }
}
