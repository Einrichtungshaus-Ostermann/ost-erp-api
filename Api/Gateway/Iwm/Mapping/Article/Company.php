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

namespace OstErpApi\Api\Gateway\Iwm\Mapping\Article;

use OstErpApi\Api\Gateway\Iwm\Mapping\Mapping;

class Company implements Mapping
{



    static public function getAlias()
    {
        return "ARTICLE_COMPANY";
    }

    static public function getColumn()
    {
        return "IWMV2R1DTA.ARTS00.ARFIRM";
    }


}