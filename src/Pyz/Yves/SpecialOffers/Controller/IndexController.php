<?php

namespace Pyz\Yves\SpecialOffers\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\SpecialOffers\SpecialOffersClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param $limit
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return array
     */
    public function indexAction($limit)
    {
        $searchResults = $this->getClient()->getPersonalizedProducts($limit);

//        dump($searchResults);die();

        return $this->viewResponse([
            'products' =>  $searchResults['products']
        ]);
    }
}
