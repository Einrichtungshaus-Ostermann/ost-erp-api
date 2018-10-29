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

namespace OstErpApi\Api\Processors\Article\CalculatedPrices;

use OstErpApi\Struct;
use OstErpApi\Api\Processors\ProcessorInterface;



class Trends
{






    /**
     * ...
     *
     * @param Struct\Article $article
     */
    public function process( Struct\CalculatedPrice $calculatedPrice, Struct\Price $price, Struct\Article $article )
    {


        $calculatedPrice->setPrice( $price->getPickupPrice() );
        $calculatedPrice->setShippingCosts( 20.0 );
        $calculatedPrice->setAssemblySurcharge( 0.0 );

    }










}
