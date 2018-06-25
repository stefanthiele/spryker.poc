<?php

namespace Pyz\Client\HelloSpryker\Zed;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class HelloSprykerStub extends ZedRequestStub implements HelloSprykerStubInterface
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer)
    {
        return $this->zedStub->call(
            '/hello-spryker/gateway/reverse-string',
            $helloSprykerTransfer
        );
    }
}
