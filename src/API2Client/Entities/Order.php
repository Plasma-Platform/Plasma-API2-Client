<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities;


use API2Client\Entities\Order\BillingInfo;
use API2Client\Entities\Order\DiscountInfo;
use API2Client\Entities\Order\Payment;
use API2Client\Entities\Order\PaymentInfo;
use API2Client\Entities\Order\ProductInfo;
use API2Client\Entities\Order\TrackingInfo;

class Order
{
    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var bool
     */
    protected $gift;

    /**
     * @var float
     */
    protected $bonusesAmount;

    /**
     * @var BillingInfo
     */
    protected $billingInfo;

    /**
     * @var PaymentInfo
     */
    protected $paymentInfo;

    /**
     * @var array
     */
    protected $discountInfoList = array();

    /**
     * @var array
     */
    protected $productInfoList = array();

    /**
     * @var TrackingInfo
     */
    protected $trackingInfo;

    /**
     * @var array
     */
    protected $paymentOptions;

    /**
     * @var string
     */
    protected $cartId;

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param BillingInfo $billingInfo
     */
    public function setBillingInfo(BillingInfo $billingInfo)
    {
        $this->billingInfo = $billingInfo;
    }

    /**
     * @return BillingInfo
     */
    public function getBillingInfo()
    {
        return $this->billingInfo ? $this->billingInfo : new BillingInfo();
    }

    /**
     * @param float $bonusesAmount
     */
    public function setBonusesAmount($bonusesAmount)
    {
        $this->bonusesAmount = $bonusesAmount;
    }

    /**
     * @return float
     */
    public function getBonusesAmount()
    {
        return $this->bonusesAmount;
    }

    /**
     * @param $discountInfo
     */
    public function addDiscountInfo($discountInfo)
    {
        $this->discountInfoList [] = $discountInfo;
    }

    /**
     * @return array
     */
    public function getDiscountInfoList()
    {
        return $this->discountInfoList;
    }

    /**
     * @param PaymentInfo $paymentInfo
     */
    public function setPaymentInfo($paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;
    }

    /**
     * @return PaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @param ProductInfo $productInfo
     */
    public function addProductInfo(ProductInfo $productInfo)
    {
        $this->productInfoList[] = $productInfo;
    }

    /**
     * @return array
     */
    public function getProductInfoList()
    {
        return $this->productInfoList;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return float
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param mixed TrackingInfo $trackingInfo
     */
    public function setTrackingInfo(TrackingInfo $trackingInfo)
    {
        $this->trackingInfo = $trackingInfo;
    }

    /**
     * @return TrackingInfo
     */
    public function getTrackingInfo()
    {
        return $this->trackingInfo ? $this->trackingInfo : new TrackingInfo ();
    }

    /**
     * @return boolean
     */
    public function isGift()
    {
        return $this->gift;
    }

    /**
     * @param boolean $gift
     */
    public function setGift($gift)
    {
        $this->gift = $gift;
    }

    /**
     * @return array
     */
    protected function getPaymentWithGift()
    {
        if ($this->isGift() === true) {
            $paymentData = new PaymentInfo ();

            return $paymentData
                ->setCurrencyId(0)
                ->setCurrencyRate(1)
                ->setPaymentId(Payment::GIFT_METHOD)
                ->toArray();
        }

        return $this->getPaymentInfo()->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = array(
            'projectId' => $this->getProjectId(),
            'amount' => $this->getAmount(),
            'bonusesAmount' => $this->getBonusesAmount(),
            'billingInfo' => $this->getBillingInfo()->toArray(),
            'paymentInfo' => $this->getPaymentWithGift(),
            'trackingInfo' => $this->getTrackingInfo()->toArray(),
            'discountInfoList' => array(),
            'payment_options' => $this->getPaymentOptions(),
            'cartId' => $this->getCartId()
        );

        $data['productInfoList'] = array();

        /**
         * @var ProductInfo $productInfo
         */
        foreach ($this->getProductInfoList() as $productInfo) {
            $data['productInfoList'][] = $productInfo->toArray();
        }

        $discountList = array();

        /** @var DiscountInfo $discount */
        foreach ($this->getDiscountInfoList() as $discount) {
            $discountList = array_merge($discountList, $discount->toArray());
        }

        $data['discountInfoList'] = $discountList;

        return $data;
    }

    /**
     * @return array
     */
    public function getPaymentOptions()
    {
        return $this->paymentOptions;
    }

    /**
     * @param array $paymentOptions
     */
    public function setPaymentOptions($paymentOptions)
    {
        $this->paymentOptions = $paymentOptions;
    }

    /**
     * @param string $cartId
     */
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
    }

    /**
     * @return string
     */
    public function getCartId()
    {
        return $this->cartId;
    }
}
