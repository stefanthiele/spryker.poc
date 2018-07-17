<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PersonalizedProduct;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\PersonalizedProduct\PersonalizedproductFactory getFactory()
 */
class PersonalizedProductClient extends AbstractClient implements PersonalizedProductClientInterface
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function getPersonalizedProducts($limit)
    {
        $searchQuery = $this
            ->getFactory()
            ->createPersonalizedProductsQueryPlugin($limit);

        $searchQueryFromatters = $this
            ->getFactory()
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
