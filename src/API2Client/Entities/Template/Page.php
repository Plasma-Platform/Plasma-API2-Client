<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class Page
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $screenShots = array();

    /**
     * @param string $name
     */
    public function setName ($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param PageScreenShot $screenShot
     */
    public function addScreenShot (PageScreenShot $screenShot)
    {
        $this->screenShots[] = $screenShot;
    }

    /**
     * @return array
     */
    public function getScreenShots ()
    {
        return $this->screenShots;
    }
} 