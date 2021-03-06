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

namespace OstErpApi\Api\Gateway\Iwm\Mapping;

interface MappingInterface
{
    /**
     * An alias for the hydrator.
     *
     * @return string
     */
    public static function getAlias(): string;

    /**
     * The actual column name.
     *
     * @return string
     */
    public static function getColumn(): string;

    /**
     * The data from the database which will be cast.
     *
     * @param string $value
     *
     * @return mixed
     */
    public static function cast($value);
}
