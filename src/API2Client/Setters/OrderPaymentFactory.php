<?php
/***********************************************************************************************************************
 *
 * Author morozov <linotex.m@gmail.com>
 * Date: 3/2/15
 * Time: 3:40 PM
 *
 **********************************************************************************************************************/

class OrderPaymentFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return Payment
     */
    public function create ($data)
    {
        $payment = new Payment ();

        $payment->setPaymentId          ($this->getValue ('payment_id', $data, 0));
        $payment->setPaymentName        ($this->getValue ('payment_name', $data, ''));
        $payment->setPaymentShortName   ($this->getValue ('payment_short_name', $data, ''));

        return $payment;
    }
}