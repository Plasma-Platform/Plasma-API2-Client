<?php


class PageScreenShot
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var string
     */
    protected $description;

    /**
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * @param int $height
     */
    public function setHeight ($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight ()
    {
        return $this->height;
    }

    /**
     * @param int $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getType ()
    {
        return $this->type;
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
     * @param int $width
     */
    public function setWidth ($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth ()
    {
        return $this->width;
    }
} 