<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PyzTest\Zed\StringReverser\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\StringReverserBuilder;

/**
 * @group PyzTest
 * @group Zed
 * @group StringReverser
 * @group Business
 * @group Facade
 * @group StringReverserFacadeTest
 * Add your own group annotations below this line
 */
class StringReverserFacadeTest extends Unit
{
    /**
     * @var \PyzTest\Zed\StringReverser\StringReverserBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testStringIsReversedCorrectly()
    {
        // Arrange
        $stringReverserTransfer = (new StringReverserBuilder([
            'originalString' => 'Hello Spryker!'
        ]))->build();

        // Act
        $stringReverserFacade = $this->tester->getLocator()->stringReverser()->facade();
        $stringReverserResultTransfer = $stringReverserFacade->reverseString($stringReverserTransfer);

        // Assert
        $this->assertEquals(
            '!rekyrpS olleH',
            $stringReverserResultTransfer->getReversedString()
        );
    }
}
