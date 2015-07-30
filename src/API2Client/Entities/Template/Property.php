<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class Property
{
    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @var array
     */
    protected $values = array ();

    /**
     * @param string $propertyName
     */
    public function setPropertyName ($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * @return string
     */
    public function getPropertyName ()
    {
        return $this->propertyName;
    }

    /**
     * @param mixed $value
     */
    public function addValue ($value)
    {
        $this->values[] = $value;
    }

    /**
     * @return array
     */
    public function getValues ()
    {
        return $this->values;
    }
} 