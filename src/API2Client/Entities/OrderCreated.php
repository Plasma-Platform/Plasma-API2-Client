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
    protected $orderId;

    /**
     * @var string
     */
    protected $paymentLink;

    /**
     * @var string
     */
    protected $paymentForm;


    /**
     * @var string
     */
    protected $paymentRedirectUrl;

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
     * @param string $paymentForm
     */
    public function setPaymentForm ($paymentForm)
    {
        $this->paymentForm = $paymentForm;
    }

    /**
     * @return string
     */
    public function getPaymentForm ()
    {
        return $this->paymentForm;
    }

    /**
     * @param string $paymentRedirectUrl
     */
    public function setPaymentRedirectUrl ($paymentRedirectUrl)
    {
        $this->paymentRedirectUrl = $paymentRedirectUrl;
    }

    /**
     * @return string
     */
    public function getPaymentRedirectUrl ()
    {
        return $this->paymentRedirectUrl;
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

    /**
     * @param string $orderId
     */
    public function setOrderId ($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getOrderId ()
    {
        return $this->orderId;
    }
} 