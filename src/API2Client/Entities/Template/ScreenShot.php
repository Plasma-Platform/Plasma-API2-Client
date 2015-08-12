<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Template;


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

    /** @var  boolean */
    protected $smallPreview;

    /** @var  boolean */
    protected $mainPreview;

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

    /**
     * @return boolean
     */
    public function isSmallPreview()
    {
        return $this->smallPreview;
    }

    /**
     * @param boolean $smallPreview
     */
    public function setSmallPreview($smallPreview)
    {
        $this->smallPreview = $smallPreview;
    }

    /**
     * @return boolean
     */
    public function isMainPreview()
    {
        return $this->mainPreview;
    }

    /**
     * @param boolean $mainPreview
     */
    public function setMainPreview($mainPreview)
    {
        $this->mainPreview = $mainPreview;
    }
}