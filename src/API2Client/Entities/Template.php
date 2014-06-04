<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com> <kolomiets.dev@gmail.com>
 * Date: 6/2/14
 * Time: 10:14 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities;


use API2Client\Entities\Template\Author;
use API2Client\Entities\Template\Category;
use API2Client\Entities\Template\Page;
use API2Client\Entities\Template\Property;
use API2Client\Entities\Template\ScreenShot;
use API2Client\Entities\Template\Style;
use API2Client\Entities\Template\Type;

/**
 * Class Template
 * @package API2Client\Entities
 */
class Template
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var double
     */
    protected $price;

    /**
     * @var double
     */
    protected $excPrice;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var int
     */
    protected $downloads;

    /**
     * @var int
     */
    protected $isFlash;

    /**
     * @var int
     */
    protected $isAdult;

    /**
     * @var int
     */
    protected $isFullSite;

    /**
     * @var \DateTime
     */
    protected $insertedDate;

    /**
     * @var \DateTime
     */
    protected $update_date;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var boolean
     */
    protected $isRealSize;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @var int
     */
    protected $packageId;

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var string
     */
    protected $keywords;

    /**
     * @var string
     */
    protected $sources;

    /**
     * @var string
     */
    protected $softwareRequired;

    /**
     * @var string
     */
    protected $livePreviewUrl;

    /**
     * @var array
     */
    protected $basicColors          = array();


    /**
     * @var array
     */
    protected $mixedColors          = array();

    /**
     * @var array
     */
    protected $styles               = array();

    /**
     * @var array
     */
    protected $categories           = array();

    /**
     * @var array
     */
    protected $sourcesAvailableList = array();

    /**
     * @var array
     */
    protected $softwareRequiredList = array();

    /**
     * @var array
     */
    protected $pages                = array();

    /**
     * @var array
     */
    protected $screenShots          = array();

    /**
     * @var array
     */
    protected $properties           = array();

    /**
     * @param \API2Client\Entities\Template\Author $author
     */
    public function setAuthor ($author)
    {
        $this->author = $author;
    }

    /**
     * @return \API2Client\Entities\Template\Author
     */
    public function getAuthor ()
    {
        return $this->author;
    }

    /**
     * @param int $basicColor
     */
    public function setBasicColors ($basicColor)
    {
        $this->basicColors[] = $basicColor;
    }

    /**
     * @return array
     */
    public function getBasicColors ()
    {
        return $this->basicColors;
    }

    /**
     * @param Category $category
     */
    public function addCategory (Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @return array
     */
    public function getCategories ()
    {
        return $this->categories;
    }

    /**
     * @param int $downloads
     */
    public function setDownloads ($downloads)
    {
        $this->downloads = $downloads;
    }

    /**
     * @return int
     */
    public function getDownloads ()
    {
        return $this->downloads;
    }

    /**
     * @param float $excPrice
     */
    public function setExcPrice ($excPrice)
    {
        $this->excPrice = $excPrice;
    }

    /**
     * @return float
     */
    public function getExcPrice ()
    {
        return $this->excPrice;
    }

    /**
     * @param int $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $insertedDate
     */
    public function setInsertedDate (\DateTime $insertedDate)
    {
        $this->insertedDate = $insertedDate;
    }

    /**
     * @return \DateTime
     */
    public function getInsertedDate ()
    {
        return $this->insertedDate;
    }

    /**
     * @param int $isAdult
     */
    public function setIsAdult ($isAdult)
    {
        $this->isAdult = $isAdult;
    }

    /**
     * @return int
     */
    public function getIsAdult ()
    {
        return $this->isAdult;
    }

    /**
     * @param int $isFlash
     */
    public function setIsFlash ($isFlash)
    {
        $this->isFlash = $isFlash;
    }

    /**
     * @return int
     */
    public function getIsFlash ()
    {
        return $this->isFlash;
    }

    /**
     * @param int $isFullSite
     */
    public function setIsFullSite ($isFullSite)
    {
        $this->isFullSite = $isFullSite;
    }

    /**
     * @return int
     */
    public function getIsFullSite ()
    {
        return $this->isFullSite;
    }

    /**
     * @param int $isRealSize
     */
    public function setIsRealSize ($isRealSize)
    {
        $this->isRealSize = $isRealSize;
    }

    /**
     * @return int
     */
    public function getIsRealSize ()
    {
        return $this->isRealSize;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords ($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords ()
    {
        return $this->keywords;
    }

    /**
     * @param string $livePreviewUrl
     */
    public function setLivePreviewUrl ($livePreviewUrl)
    {
        $this->livePreviewUrl = $livePreviewUrl;
    }

    /**
     * @return string
     */
    public function getLivePreviewUrl ()
    {
        return $this->livePreviewUrl;
    }

    /**
     * @param int $mixedColor
     */
    public function addMixedColor ($mixedColor)
    {
        $this->mixedColors[] = $mixedColor;
    }

    /**
     * @return array
     */
    public function getMixedColors ()
    {
        return $this->mixedColors;
    }

    /**
     * @param int $packageId
     */
    public function setPackageId ($packageId)
    {
        $this->packageId = $packageId;
    }

    /**
     * @return int
     */
    public function getPackageId ()
    {
        return $this->packageId;
    }

    /**
     * @param Page $page
     */
    public function addPage (Page $page)
    {
        $this->pages[] = $page;
    }

    /**
     * @return array
     */
    public function getPages ()
    {
        return $this->pages;
    }

    /**
     * @param float $price
     */
    public function setPrice ($price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice ()
    {
        return $this->price;
    }

    /**
     * @param Property $property
     */
    public function addProperty (Property $property)
    {
        $this->properties[] = $property;
    }

    /**
     * @return array
     */
    public function getProperties ()
    {
        return $this->properties;
    }

    /**
     * @param ScreenShot $screenShots
     */
    public function addScreenShot (ScreenShot $screenShots)
    {
        $this->screenShots[] = $screenShots;
    }

    /**
     * @return array
     */
    public function getScreenShots ()
    {
        return $this->screenShots;
    }

    /**
     * @param string $softwareRequired
     */
    public function setSoftwareRequired ($softwareRequired)
    {
        $this->softwareRequired = $softwareRequired;
    }

    /**
     * @return string
     */
    public function getSoftwareRequired ()
    {
        return $this->softwareRequired;
    }

    /**
     * @param int $softwareRequired
     */
    public function addSoftwareRequiredToList ($softwareRequired)
    {
        $this->softwareRequiredList[] = $softwareRequired;
    }

    /**
     * @return array
     */
    public function getSoftwareRequiredList ()
    {
        return $this->softwareRequiredList;
    }

    /**
     * @param string $sources
     */
    public function setSources ($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return string
     */
    public function getSources ()
    {
        return $this->sources;
    }

    /**
     * @param int $sourcesAvailable
     */
    public function addtSourcesAvailableToList ($sourcesAvailable)
    {
        $this->sourcesAvailableList[] = $sourcesAvailable;
    }

    /**
     * @return array
     */
    public function getSourcesAvailableList ()
    {
        return $this->sourcesAvailableList;
    }

    /**
     * @param int $state
     */
    public function setState ($state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getState ()
    {
        return $this->state;
    }

    /**
     * @param \API2Client\Entities\Template\Type $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * @return \API2Client\Entities\Template\Type
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @param \DateTime $update_date
     */
    public function setUpdateDate ($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDate ()
    {
        return $this->update_date;
    }

    /**
     * @param string $width
     */
    public function setWidth ($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getWidth ()
    {
        return $this->width;
    }

    /**
     * @param Style $style
     */
    public function addStyle (Style $style)
    {
        $this->styles[] = $style;
    }

    /**
     * @return array
     */
    public function getStyles ()
    {
        return $this->styles;
    }




}