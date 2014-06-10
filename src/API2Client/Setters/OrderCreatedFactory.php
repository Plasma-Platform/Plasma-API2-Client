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


class OrderCreatedFactory extends FactoryAbstract
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
        $orderCreated->setStatus ($this->getValue ('status', $data, ''));

        return $orderCreated;
    }
}