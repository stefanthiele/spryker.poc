<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\PersonalizedProduct\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\PersonalizedProduct\PersonalizedProductClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param $limit
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction($limit)
    {
        $searchResults = $this->getClient()->getPersonalizedProducts($limit);

        return $this->view(
            $searchResults,
            [],
            '@PersonalizedProduct/views/index/index.twig'
        );
    }
}
