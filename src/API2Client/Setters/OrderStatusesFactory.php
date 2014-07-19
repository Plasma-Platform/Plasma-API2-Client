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

class OrderStatusesFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return Status
     */
    public function create ($data)
    {
        $statusesArrayList = [];

        foreach ($data as $status)
        {
            $orderStatus = new Status ();

            $orderStatus->setStatusCode ($this->getValue ('status_code', $status, 0));
            $orderStatus->setStatusName ($this->getValue ('status_name', $status, ''));

            $statusesArrayList[] = $orderStatus;

        }

        return $statusesArrayList;
    }
}