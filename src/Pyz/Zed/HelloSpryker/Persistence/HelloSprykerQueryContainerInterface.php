<?php
/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Persistence;

interface HelloSprykerQueryContainerInterface
{
    /**
     * @api
     *
     * @param int $idHelloSpryker
     *
     * @return \Orm\Zed\HelloSpryker\Persistence\PyzHelloSprykerQuery
     */
    public function queryHelloSprykerById($idHelloSpryker);

    /**
     * @api
     *
     * @return \Orm\Zed\HelloSpryker\Persistence\PyzHelloSprykerQuery
     */
    public function queryHelloSpryker();
}
