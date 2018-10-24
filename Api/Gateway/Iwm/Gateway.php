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

namespace OstErpApi\Api\Gateway\Iwm;

use OstErpApi\Services\ConfigurationService;
use OstErpApi\Api\Gateway\Gateway as GatewayParent;




abstract class Gateway extends GatewayParent
{



    /**
     * @var \PDO
     */
    protected static $db;





    /**
     * Gateway constructor.
     *
     * @param ConfigurationService $configurationService
     */
    public function __construct(ConfigurationService $configurationService)
    {

        parent::__construct($configurationService);


        if (static::$db === null) {
            try {
                static::$db = new \PDO(
                    'odbc:' . $configurationService->get('credentialsServer'),
                    $configurationService->get('credentialsLogin'),
                    $configurationService->get('credentialsPassword'));
            } catch (\Exception $exception) {
                die('establishing connection failed:' . $exception->getMessage());
            }
        }


    }



    protected function getQuery()
    {
        return "";
    }

    protected function addParams( array $params )
    {
    }


    public function findBy(array $parameters = []): array
    {
        $query = $this->getQuery();

        $this->addParams( $parameters );


        /* @var $parser Mapping\Parser */
        $parser = Shopware()->Container()->get( "ost_erp_api.api.gateway.iwm.mapping.parser" );




        $query = $parser->parseSelect($query);



        if ( count( $parameters ) > 0 )
        {

            // add braces to the where append terms and parse the string
            $parameters = array_map(
                function ($term) use ($parser) {
                    return '(' . $parser->parseParameter($term) . ')';
                },
                $parameters
            );

            // add the where append
            $query .= ' WHERE ' . implode(' AND ', $parameters) . ' ';



        }




        $res = static::$db->query($query);

        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

}
