<?php

namespace Pyz\Client\SpecialOffers;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\SpecialOffers\SpecialOffersFactory getFactory()
 */
class SpecialOffersClient extends AbstractClient implements SpecialOffersClientInterface
{
    /**
     * @param int $limit
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return array
     */
    public function getPersonalizedProducts($limit)
    {
        $searchQuery = $this->getFactory()
            ->createPersonalizedProductsQueryPlugin($limit);

        $searchQueryFromatters = $this->getFactory()
            ->getSearchQueryFormatters();

        $searchResult = $this->getFactory()
            ->getSearchClient()
            ->search(
                $searchQuery,
                $searchQueryFromatters
            );

        return $searchResult;
    }
}
