<?php

namespace Pyz\Client\SpecialOffers;

use Pyz\Client\SpecialOffers\Plugin\Elasticsearch\Query\PersonalizedProductsQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;

class SpecialOffersFactory extends AbstractFactory
{
    /**
     * @param $limit
     *
     * @return PersonalizedProductsQueryPlugin
     */
    public function createPersonalizedProductsQueryPlugin($limit)
    {
        return new PersonalizedProductsQueryPlugin($limit);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return array
     */
    public function getSearchQueryFormatters()
    {
        return $this->getProvidedDependency(SpecialOffersDependencyProvider::CATALOG_SEARCH_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(SpecialOffersDependencyProvider::CLIENT_SEARCH);
    }
}
