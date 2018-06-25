<?php

namespace Pyz\Client\HelloSpryker\Zed;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface HelloSprykerStubInterface
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer);
}
