<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class ScreenShot
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $filemtime;

    /**
     * @param \DateTime $filemtime
     */
    public function setFilemtime ($filemtime)
    {
        $this->filemtime = $filemtime;
    }

    /**
     * @return \DateTime
     */
    public function getFilemtime ()
    {
        return $this->filemtime;
    }

    /**
     * @param string $url
     */
    public function setUrl ($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl ()
    {
        return $this->url;
    }
} 