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

namespace OstErpApi\Struct;

class Location extends Struct
{


    /**
     * The internal ERP key for the location.
     *
     * Example
     * - 100
     * - 200
     *
     * @var string
     */
    protected $key;



    /**
     * The internal ERP key for the Store.
     *
     * @var Store
     */
    protected $store;



    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }



    /**
     * Setter method for the property.
     *
     * @param string $key
     *
     * @return void
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }



    /**
     * Getter method for the property.
     *
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }



    /**
     * Setter method for the property.
     *
     * @param Store $store
     *
     * @return void
     */
    public function setStore(Store $store)
    {
        $this->store = $store;
    }



}
