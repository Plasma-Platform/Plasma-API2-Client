<?php

namespace API2Client\Entities\Order;

/**
 * Class BillingPortal
 * @package API2Client\Entities\Order
 * @property string $url
 * @property array $messages
 * @property bool $status
 */
class BillingPortal
{
    private $url;
    private $status = false;
    private $messages = array();

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return BillingPortal
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return BillingPortal
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
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
     * @return BillingPortal
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
        return $this;
    }
}
