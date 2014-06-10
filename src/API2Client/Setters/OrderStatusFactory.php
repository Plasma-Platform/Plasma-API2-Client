<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;



use API2Client\Entities\Order\Status;

class OrderStatusFactory extends FactoryAbstract
{
    /**
     * @param array $data
     * @return Status
     */
    public function create ($data)
    {
        $orderStatus = new Status ();

        $orderStatus->setStatusCode ($this->getValue ('status_code', $data, 0));
        $orderStatus->setStatusName ($this->getValue ('status_name', $data, ''));

        return $orderStatus;
    }
}