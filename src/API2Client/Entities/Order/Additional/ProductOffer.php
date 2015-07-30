<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class ProductOffer implements AdditionalInfoInterface
{
    /**
     * @var int
     */
    protected $templateId;

    /**
     * @var int
     */
    protected $searchContextId;

    /**
     * @var int
     */
    protected $presentationId;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var int
     */
    protected $channelId;

    /**
     * @var float
     */
    protected $offerPercentDiscount;

    /**
     * @param int $channelId
     */
    public function setChannelId ($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return int
     */
    public function getChannelId ()
    {
        return $this->channelId;
    }

    /**
     * @param int $offerPercentDiscount
     */
    public function setOfferPercentDiscount ($offerPercentDiscount)
    {
        $this->offerPercentDiscount = $offerPercentDiscount;
    }

    /**
     * @return int
     */
    public function getOfferPercentDiscount ()
    {
        return $this->offerPercentDiscount;
    }

    /**
     * @param int $position
     */
    public function setPosition ($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getPosition ()
    {
        return $this->position;
    }

    /**
     * @param int $presentationId
     */
    public function setPresentationId ($presentationId)
    {
        $this->presentationId = $presentationId;
    }

    /**
     * @return int
     */
    public function getPresentationId ()
    {
        return $this->presentationId;
    }

    /**
     * @param int $searchContextId
     */
    public function setSearchContextId ($searchContextId)
    {
        $this->searchContextId = $searchContextId;
    }

    /**
     * @return int
     */
    public function getSearchContextId ()
    {
        return $this->searchContextId;
    }

    /**
     * @param int $templateId
     */
    public function setTemplateId ($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return int
     */
    public function getTemplateId ()
    {
        return $this->templateId;
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        return array (
            'channelId'             => $this->getTemplateId (),
            'offerPercentDiscount'  => $this->getOfferPercentDiscount (),
            'position'              => $this->getPosition (),
            'presentationId'        => $this->getPresentationId (),
            'searchContextId'       => $this->getSearchContextId (),
            'templateId'            => $this->getTemplateId (),
        );
    }
}