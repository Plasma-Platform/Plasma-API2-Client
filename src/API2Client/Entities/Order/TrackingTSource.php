<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class TrackingTSource
{
    protected $primary;

    protected $secondary;

    /**
     * @param mixed $primary
     */
    public function setPrimary ($primary)
    {
        $this->primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getPrimary ()
    {
        return $this->primary;
    }

    /**
     * @param mixed $secondary
     */
    public function setSecondary ($secondary)
    {
        $this->secondary = $secondary;
    }

    /**
     * @return mixed
     */
    public function getSecondary ()
    {
        return $this->secondary;
    }

    public function toArray ()
    {
        return array (
            'primary'   => $this->getPrimary (),
            'secondary' => $this->getSecondary (),
        );
    }
}