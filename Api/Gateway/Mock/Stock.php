<?php declare(strict_types=1);
/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - ERP API
 *
 * @package   OstErpApi
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2018 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstErpApi\Api\Gateway\Mock;

use OstErpApi\Api\Gateway\Gateway;

class Stock extends Gateway
{
    public function findBy(array $parameters = []): array
    {
        if (empty($parameters)) {
            return [
                [
                    'ARTICLE_NUMBER' => '161578',
                    'STOCK_QUANTITY' => 1337,
                    'LOCATION_KEY'   => 100,
                ],
            ];
        }

        return [
            [
                'ARTICLE_NUMBER' => '161578',
                'STOCK_QUANTITY' => 1337,
                'LOCATION_KEY'   => 100,
            ],
            [
                'ARTICLE_NUMBER' => '930392',
                'STOCK_QUANTITY' => 2342,
                'LOCATION_KEY'   => 150,
            ],
        ];
    }
}
