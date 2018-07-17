<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\PersonalizedProduct\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class PersonalizedProductControllerProvider extends AbstractYvesControllerProvider
{
    const PERSONALIZED_PRODUCT_INDEX = 'personalized-product-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/personalized-product/{limit}', static::PERSONALIZED_PRODUCT_INDEX, 'PersonalizedProduct', 'Index', 'index')
            ->value('limit', 10)
            ->assert('limit', '\d+');
    }
}
