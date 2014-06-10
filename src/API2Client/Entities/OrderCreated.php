<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities;


class OrderCreated
{
    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $paymentLink;

    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $customerId
     */
    public function setCustomerId ($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getCustomerId ()
    {
        return $this->customerId;
    }

    /**
     * @param string $paymentLink
     */
    public function setPaymentLink ($paymentLink)
    {
        $this->paymentLink = $paymentLink;
    }

    /**
     * @return string
     */
    public function getPaymentLink ()
    {
        return $this->paymentLink;
    }

    /**
     * @param string $status
     */
    public function setStatus ($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus ()
    {
        return $this->status;
    }
} 