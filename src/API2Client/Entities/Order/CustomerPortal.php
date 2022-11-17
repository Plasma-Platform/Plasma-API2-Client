<?php

namespace API2Client\Entities\Order;

/**
 * Class CustomerPortal
 * @package API2Client\Entities\Order
 * @property string $link
 */
class CustomerPortal
{
    protected $link;

    /**
     * @var bool
     */
    private $status = false;

    /**
     * @var array
     */
    private $messages = array();

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
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
    public function isSuccess()
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
}