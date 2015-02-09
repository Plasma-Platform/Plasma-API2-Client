<?php
/***********************************************************************************************************************
 *
 * Author morozov <linotex.m@gmail.com>
 * Date: 9/2/15
 * Time: 11:20 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;



use API2Client\Entities\Order\Currency;

class OrderCurrencyFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return Currency
     */
    public function create ($data)
    {
        $currency = new Currency ();

        $currency->setCurrencyId     ($this->getValue ('currency_id', $data, 0));
        $currency->setCurrencyCode   ($this->getValue ('currency_code', $data, ''));
        $currency->setCurrencyName   ($this->getValue ('currency_name', $data, ''));

        return $currency;
    }
}