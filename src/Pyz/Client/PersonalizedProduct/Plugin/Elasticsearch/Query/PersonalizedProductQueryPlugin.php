<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PersonalizedProduct\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\FunctionScore;
use Elastica\Query\Match;
use Elastica\Query\MatchAll;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;
use Spryker\Shared\ProductSearch\ProductSearchConfig;

class PersonalizedProductQueryPlugin implements QueryInterface
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @param int $limit
     */
    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return \Elastica\Query
     */
    public function getSearchQuery()
    {
        $boolQuery = (new BoolQuery())
            ->addMust((new FunctionScore())
                ->setQuery(new MatchAll())
                ->addFunction('random_score', ['seed' => session_id()])
                ->setScoreMode('sum'))
            ->addMust((new Match())
                ->setField(PageIndexMap::TYPE, ProductSearchConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT));

        $query = (new Query())
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA])
            ->setQuery($boolQuery)
            ->setSize($this->limit);

        return $query;
    }
}
