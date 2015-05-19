<?php
/***********************************************************************************************************************
 * @author: <kolomiets.dev@gmail.com> 
 **********************************************************************************************************************/

namespace API2Client\Entities;


use API2Client\Entities\Order\ProductInfo;

class OrderItem
{
    /**
     * @var int
     */
    protected $status_code;

    /**
     * @var string
     */
    protected $status_name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var array
     */
    protected $productInfoList = array ();

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param int $status_code
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * @param string $status_name
     */
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return array
     */
    public function getProductInfoList()
    {
        return $this->productInfoList;
    }

    /**
     * @param array $productInfoList
     */
    public function setProductInfoList($productInfoList)
    {
        $this->productInfoList = $productInfoList;
    }

    /**
     * @param ProductInfo $productInfoList
     */
    public function addProductInfo (ProductInfo $productInfoList)
    {
        $this->productInfoList [] = $productInfoList;
    }
}