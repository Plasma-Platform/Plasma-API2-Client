<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;


use API2Client\Entities\OrderCreated;


class OrderCreatedFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return OrderCreated
     */
    public function create ($data)
    {
        $orderCreated = new OrderCreated ();

        $orderCreated->setCustomerId ($this->getValue ('customerId', $data, ''));
        $orderCreated->setPaymentLink ($this->getValue ('paymentLink', $data, ''));
        $orderCreated->setPaymentForm ($this->getValue ('paymentForm', $data, ''));
        $orderCreated->setPaymentRedirectUrl ($this->getValue ('redirectUrl', $data, ''));
        $orderCreated->setStatus ($this->getValue ('status', $data, ''));

        return $orderCreated;
    }
}