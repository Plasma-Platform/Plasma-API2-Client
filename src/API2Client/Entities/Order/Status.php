<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class Status
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusName;

    /**
     * @param int $statusCode
     */
    public function setStatusCode ($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode ()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusName
     */
    public function setStatusName ($statusName)
    {
        $this->statusName = $statusName;
    }

    /**
     * @return string
     */
    public function getStatusName ()
    {
        return $this->statusName;
    }
} 