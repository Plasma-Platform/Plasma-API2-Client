<?php

namespace API2Client\Entities\Order\Additional;

class ProductInfo implements AdditionalInfoInterface
{
    /**
     * @var string
     */
    protected $orderId;


    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter(array(
            'order_id' => $this->getOrderId(),
        ));
    }
}
