<?php
/***********************************************************************************************************************
 *
 * Author morozov <linotex.dev@gmail.com>
 * Date: 3/2/15
 * Time: 3:30 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class Payment
{
    /**
     * @var int
     */
    protected $paymentId;

    /**
     * @var string
     */
    protected $paymentName;

    /**
     * @var string
     */
    protected $paymentShortName;

    /**
     * @param $paymentId
     */
    public function setPaymentId ($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getPaymentId ()
    {
        return $this->paymentId;
    }

    /**
     * @param $paymentName
     */
    public function setPaymentName ($paymentName)
    {
        $this->paymentName = $paymentName;
    }

    /**
     * @return string
     */
    public function getPaymentName ()
    {
        return $this->paymentName;
    }

    /**
     * @param $paymentShortName
     */
    public function setPaymentShortName ($paymentShortName)
    {
        $this->paymentShortName = $paymentShortName;
    }

    /**
     * @return string
     */
    public function getPaymentShortName ()
    {
        return $this->paymentShortName;
    }
} 