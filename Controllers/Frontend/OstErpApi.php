<?php declare(strict_types=1);

namespace OstErpApi\Controllers\Frontend;

use Enlight_Controller_Action;
use Shopware\Components\CSRFWhitelistAware;
use OstErpApi\Api\Api;

class OstErpApi extends Enlight_Controller_Action implements CSRFWhitelistAware
{
    /**
     * ...
     *
     * @return array
     */
    public function getWhitelistedCSRFActions()
    {
        // return all actions
        return array_values(array_filter(
            array_map(
                function ($method) { return (substr($method, -6) === 'Action') ? substr($method, 0, -6) : null; },
                get_class_methods($this)
            ),
            function ($method) { return  !in_array((string) $method, ['', 'index', 'load', 'extends'], true); }
        ));
    }



    /**
     * ...
     */
    public function indexAction()
    {
        // ...
        die('not implemented yet');
    }





    /**
     * ...
     */
    public function testArticleAction()
    {
        /* @var $api Api */
        $api = Shopware()->Container()->get( "ost_erp_api.api" );

        $asd = $api->findBy(
            "article",
            array(
                "[article.number] = 121535"
            )
        );



        var_dump($asd);
        die();
    }


}
