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



class Ostermann
{






    /**
     * ...
     *
     * @param Struct\Article $article
     */
    public function process( Struct\CalculatedPrice $calculatedPrice, Struct\Price $price, Struct\Article $article )
    {



        if ( $article->getHwg() > 90 )
        {
            $this->calculateJunk( $calculatedPrice, $price, $article );
        }
        else
        {
            $this->calculateFurniture( $calculatedPrice, $price, $article );
        }


    }




    /**
     * ...
     *
     * @param Struct\Article $article
     */
    private function calculateJunk( Struct\CalculatedPrice $calculatedPrice, Struct\Price $price, Struct\Article $article )
    {


        $pickupPrice = round( $price->getPickupPrice() * 0.97, 2 );



        $calculatedPrice->setPrice( $pickupPrice );
        $calculatedPrice->setShippingCosts( 0.0 );
        $calculatedPrice->setAssemblySurcharge( 0.0 );


    }









    /**
     * ...
     *
     * @param Struct\Article $article
     */
    private function calculateFurniture( Struct\CalculatedPrice $calculatedPrice, Struct\Price $price, Struct\Article $article )
    {


        if ( $article->getHwg() == 79 )
        {
            $pickupPrice = round( $price->getPickupPrice() * 0.97, 2 );
            $deliveryPrice = round( $price->getDeliveryPrice() * 0.97, 2 );
            $fullservicePrice = round( $price->getFullservicePrice() * 0.97, 2 );
        }
        else
        {
            $pickupPrice = $price->getPickupPrice();
            $deliveryPrice = $price->getDeliveryPrice();
            $fullservicePrice = $price->getFullservicePrice();

        }






        switch( $article->getLabel()->getType() )
        {
            case Struct\Label::TYPE_PICKUP:
            case Struct\Label::TYPE_DELIVERY:

                $calculatedPrice->setPrice( $pickupPrice );


                // optional fullservice if every price is available
                if ( ( $pickupPrice > 0 ) and ( $deliveryPrice > 0 ) and ( $fullservicePrice > 0 ) )
                {
                    $calculatedPrice->setShippingCosts( $deliveryPrice - $pickupPrice );
                    $calculatedPrice->setAssemblySurcharge( $fullservicePrice - $deliveryPrice );
                }
                // only delivery price without additional assembly
                else
                {
                    $calculatedPrice->setShippingCosts( max( $deliveryPrice, $fullservicePrice ) - $pickupPrice );
                    $calculatedPrice->setAssemblySurcharge( 0.0 );
                }


                break;



            case Struct\Label::TYPE_FULLSERVICE:

                $calculatedPrice->setPrice( $fullservicePrice );
                $calculatedPrice->setShippingCosts( 0.0 );
                $calculatedPrice->setAssemblySurcharge( 0.0 );


                break;
        }





    }











}