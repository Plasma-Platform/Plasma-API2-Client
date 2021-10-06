<?php

namespace API2Client\Entities;


class SubscriptionResult
{
    /**
     * @var bool
     */
    private $status = false;
    /**
     * @var string
     */
    private $redirect_url;

    /**
     * @var Subscription
     */
    private $subscription;

    /**
     * @var array
     */
    private $messages = array();

    private $payment_reference;
    
    private $client_secret;

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * @param mixed $redirect_url
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->redirect_url = $redirect_url;
    }

    /**
     * @return Subscription
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @param mixed $subscription
     */
    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return boolean
     */
    public function isSuccess ()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentReference()
    {
        return $this->payment_reference;
    }

    /**
     * @param mixed $payment_reference
     */
    public function setPaymentReference($payment_reference)
    {
        $this->payment_reference = $payment_reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * @param mixed $client_secret
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;
        return $this;
    }

}