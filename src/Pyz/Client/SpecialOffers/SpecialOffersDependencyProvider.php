<?php

namespace Pyz\Client\SpecialOffers;

use Spryker\Client\Catalog\Plugin\Elasticsearch\ResultFormatter\RawCatalogSearchResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class SpecialOffersDependencyProvider extends AbstractDependencyProvider
{
    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const CATALOG_SEARCH_RESULT_FORMATTER_PLUGINS = 'CATALOG_SEARCH_RESULT_FORMATTER_PLUGINS';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addSearchClient($container);
        $container = $this->addCatalogSearchResultFormatterPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addSearchClient(Container $container)
    {
        $container[static::CLIENT_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->client();
        };

        return $container;
    }

    public function addCatalogSearchResultFormatterPlugins($container)
    {
        $container[static::CATALOG_SEARCH_RESULT_FORMATTER_PLUGINS] = function () {
            return [
                new RawCatalogSearchResultFormatterPlugin()
            ];
        };

        return $container;
    }
}
