<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

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
     * @return $this
     */
    public function setCurrencyId ($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
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
     * @return $this
     */
    public function setCurrencyRate ($currencyRate)
    {
        $this->currencyRate = $currencyRate;

        return $this;
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
     * @return $this
     */
    public function setPaymentId ($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
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
     * @return $this
     */
    public function setRecurrentOrderId ($recurrentOrderId)
    {
        $this->recurrentOrderId = $recurrentOrderId;

        return $this;
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