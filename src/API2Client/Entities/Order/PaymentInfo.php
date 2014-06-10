<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class PaymentInfo 
{
    /**
     * @var int
     */
    protected $currencyId;

    /**
     * @var float
     */
    protected $currencyRate;

    /**
     * @var int
     */
    protected $paymentId;

    /**
     * @var string
     */
    protected $recurrentOrderId;

    /**
     * @param int $currencyId
     */
    public function setCurrencyId ($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return int
     */
    public function getCurrencyId ()
    {
        return $this->currencyId;
    }

    /**
     * @param float $currencyRate
     */
    public function setCurrencyRate ($currencyRate)
    {
        $this->currencyRate = $currencyRate;
    }

    /**
     * @return float
     */
    public function getCurrencyRate ()
    {
        return $this->currencyRate;
    }

    /**
     * @param int $paymentId
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
     * @param string $recurrentOrderId
     */
    public function setRecurrentOrderId ($recurrentOrderId)
    {
        $this->recurrentOrderId = $recurrentOrderId;
    }

    /**
     * @return string
     */
    public function getRecurrentOrderId ()
    {
        return $this->recurrentOrderId;
    }

    public function toArray ()
    {
        return array (
            'currencyId'    => $this->getCurrencyId (),
            'currencyRate'  => $this->getCurrencyRate (),
            'paymentId'     => $this->getPaymentId (),
        );
    }
}