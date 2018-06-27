<?php

namespace Pyz\Client\SpecialOffers;

interface SpecialOffersClientInterface
{
    /**
     * @param int $limit
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return array
     */
    public function getPersonalizedProducts($limit);
}
