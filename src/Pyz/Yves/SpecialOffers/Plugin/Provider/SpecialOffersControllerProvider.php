<?php

namespace Pyz\Yves\SpecialOffers\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class SpecialOffersControllerProvider extends AbstractYvesControllerProvider
{
    const SPECIALOFFERS_INDEX = 'specialoffers-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/special-offers/{limit}', static::SPECIALOFFERS_INDEX, 'SpecialOffers', 'Index', 'index')
            ->value('limit', 10)
            ->assert('limit', '\d+');
    }
}
