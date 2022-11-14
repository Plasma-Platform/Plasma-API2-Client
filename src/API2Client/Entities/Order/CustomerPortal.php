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
}