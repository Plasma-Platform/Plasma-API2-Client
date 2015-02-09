<?php
/***********************************************************************************************************************
 *
 * Author morozov <linotex.dev@gmail.com>
 * Date: 9/2/15
 * Time: 11:11 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class Currency
{
    /**
     * @var int
     */
    protected $currencyId;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $currencyName;

    /**
     * @param $currencyId
     */
    public function setCurrencyId ($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return int
     */
    public function getCurrencyId ()
    {
        return $this->currencyId;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode ($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return string
     */
    public function getCurrencyCode ()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyName
     */
    public function setCurrencyName ($currencyName)
    {
        $this->currencyName = $currencyName;
    }

    /**
     * @return string
     */
    public function getCurrencyName ()
    {
        return $this->currencyName;
    }
} 