<?php

namespace API2Client\Entities;

use API2Client\Entities\Order\DiscountInfo;
use API2Client\Entities\Order\ProductInfo;

class Subscription
{
    const PERIOD_DAYS = 'D';

    const PERIOD_WEEK = 'W';

    const PERIOD_MONT = 'M';

    const PERIOD_YEAR = 'Y';

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $payment_system_id;

    /**
     * @var int
     */
    private $project_id;

    /**
     * @var int
     */
    private $currency_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $status = 0;

    /**
     * @var string
     */
    private $statusName;

    /**
     * @var
     */
    private $start;

    /**
     * @var
     */
    private $period;

    /**
     * @var int
     */
    private $term = 0;

    /**
     * @var int
     */
    private $amount = 0;

    /**
     * @var float
     */
    private $init_amount = 0;

    /**
     * @var string
     */
    private $customer_phone;

    /**
     * @var string
     */
    private $customer_email;

    /**
     * @var string
     */
    private $customer_fullname;

    /**
     * @var string
     */
    private $customer_address;

    /**
     * @var string
     */
    private $customer_zip;

    /**
     * @var string
     */
    private $customer_country_code;

    /**
     * @var string
     */
    private $customer_state_code;

    /**
     * @var string
     */
    private $customer_city;

    /**
     * @var string
     */
    private $customer_user_agent;

    /**
     * @var string
     */
    private $customer_ip_address;

    /**
     * @var string
     */
    private $customer_local_time;

    /**
     * @var string
     */
    private $affiliate_name;

    /**
     * @var array
     */
    protected $paymentOptions;

    /**
     * @var DiscountInfo[]
     */
    protected $discountInfoList = array();

    /**
     * @var ProductInfo[]
     */
    protected $productInfoList = array();

    /**
     * @var string
     */
    protected $cartId;

    /**
     * @return string
     */
    public function getAffiliateName()
    {
        return $this->affiliate_name;
    }

    /**
     * @param string $affiliate_name
     * @return $this
     */
    public function setAffiliateName($affiliate_name)
    {
        $this->affiliate_name = $affiliate_name;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedPeriods()
    {
        return array(
            self::PERIOD_DAYS,
            self::PERIOD_WEEK,
            self::PERIOD_MONT,
            self::PERIOD_YEAR,
        );
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentSystemId()
    {
        return $this->payment_system_id;
    }

    /**
     * @param int $payment_system_id
     * @return $this
     */
    public function setPaymentSystemId($payment_system_id)
    {
        $this->payment_system_id = $payment_system_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     * @return $this
     */
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * @param int $currency_id
     * @return $this
     */
    public function setCurrencyId($currency_id)
    {
        $this->currency_id = $currency_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * @param string $statusName
     * @return $this
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     * @return $this
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return int
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param int $term
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getInitAmount()
    {
        return $this->init_amount;
    }

    /**
     * @param float $init_amount
     * @return $this
     */
    public function setInitAmount($init_amount)
    {
        $this->init_amount = $init_amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customer_phone;
    }

    /**
     * @param string $customer_phone
     * @return $this
     */
    public function setCustomerPhone($customer_phone)
    {
        $this->customer_phone = $customer_phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @param string $customer_email
     * @return $this
     */
    public function setCustomerEmail($customer_email)
    {
        $this->customer_email = $customer_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFullname()
    {
        return $this->customer_fullname;
    }

    /**
     * @param string $customer_fullname
     * @return $this
     */
    public function setCustomerFullname($customer_fullname)
    {
        $this->customer_fullname = $customer_fullname;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customer_address;
    }

    /**
     * @param string $customer_address
     * @return $this
     */
    public function setCustomerAddress($customer_address)
    {
        $this->customer_address = $customer_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerZip()
    {
        return $this->customer_zip;
    }

    /**
     * @param string $customer_zip
     * @return $this
     */
    public function setCustomerZip($customer_zip)
    {
        $this->customer_zip = $customer_zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCountryCode()
    {
        return $this->customer_country_code;
    }

    /**
     * @param string $customer_country_code
     * @return $this
     */
    public function setCustomerCountryCode($customer_country_code)
    {
        $this->customer_country_code = $customer_country_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerStateCode()
    {
        return $this->customer_state_code;
    }

    /**
     * @param string $customer_state_code
     * @return $this
     */
    public function setCustomerStateCode($customer_state_code)
    {
        $this->customer_state_code = $customer_state_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCity()
    {
        return $this->customer_city;
    }

    /**
     * @param string $customer_city
     * @return $this
     */
    public function setCustomerCity($customer_city)
    {
        $this->customer_city = $customer_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerUserAgent()
    {
        return $this->customer_user_agent;
    }

    /**
     * @param string $customer_user_agent
     * @return $this
     */
    public function setCustomerUserAgent($customer_user_agent)
    {
        $this->customer_user_agent = $customer_user_agent;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerIpAddress()
    {
        return $this->customer_ip_address;
    }

    /**
     * @param string $customer_ip_address
     * @return $this
     */
    public function setCustomerIpAddress($customer_ip_address)
    {
        $this->customer_ip_address = $customer_ip_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLocalTime()
    {
        return $this->customer_local_time;
    }

    /**
     * @param string $customer_local_time
     * @return $this
     */
    public function setCustomerLocalTime($customer_local_time)
    {
        $this->customer_local_time = $customer_local_time;
        return $this;
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

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'project_id' => $this->getProjectId(),
            'payment_system_id' => $this->getPaymentSystemId(),
            'currency_id' => $this->getCurrencyId(),
            'title' => $this->getTitle(),
            'period' => $this->getPeriod(),
            'start' => $this->getStart(),
            'term' => $this->getTerm(),
            'amount' => $this->getAmount(),
            'init_amount' => $this->getInitAmount(),
            'customer_email' => $this->getCustomerEmail(),
            'customer_fullname' => $this->getCustomerFullname(),
            'customer_address' => $this->getCustomerAddress(),
            'customer_country_code' => $this->getCustomerCountryCode(),
            'customer_state_code' => $this->getCustomerStateCode(),
            'customer_city' => $this->getCustomerCity(),
            'customer_zip' => $this->getCustomerZip(),
            'customer_phone' => $this->getCustomerPhone(),
            'customer_user_agent' => $this->getCustomerUserAgent(),
            'customer_ip_address' => $this->getCustomerIpAddress(),
            'customer_local_time' => $this->getCustomerLocalTime(),
            'affiliate_name' => $this->getAffiliateName(),
            'payment_options' => $this->getPaymentOptions(),
            'cartId' => $this->getCartId(),
        );
    }
}
