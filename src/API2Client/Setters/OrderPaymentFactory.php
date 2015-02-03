<?php
/***********************************************************************************************************************
 *
 * Author morozov <linotex.m@gmail.com>
 * Date: 3/2/15
 * Time: 3:40 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;



use API2Client\Entities\Order\Payment;

class OrderPaymentFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return Payment
     */
    public function create ($data)
    {
        $orderStatus = new Payment ();

        $orderStatus->setPaymentId          ($this->getValue ('payment_id', $data, 0));
        $orderStatus->setPaymentName        ($this->getValue ('payment_name', $data, ''));
        $orderStatus->setPaymentShortName   ($this->getValue ('payment_short_name', $data, ''));

        return $orderStatus;
    }
}