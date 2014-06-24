<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class DiscountInfo
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var int
     */
    protected $value;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $code
     */
    public function setCode ($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode ()
    {
        return $this->code;
    }

    /**
     * @param string $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @param int $value
     */
    public function setValue ($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue ()
    {
        return $this->value;
    }

    public function toArray ()
    {
        return array (
            $this->getCode() => array(
                'type'  => $this->getType(),
                'value' => $this->getValue(),
            )
        );
    }
}