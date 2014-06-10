<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class TrackingInfo
{
    /**
     * @var string
     */
    protected $affiliateName;

    /**
     * @var string
     */
    protected $affiliateTime;

    /**
     * @var string
     */
    protected $campaignName;

    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $firstCustomerId;

    /**
     * @var string
     */
    protected $newCartFlag;

    /**
     * @var string
     */
    protected $refererUrl;

    /**
     * @var string
     */
    protected $rmsLocale;

    /**
     * @var string
     */
    protected $userAgent;

    /**
     * @var string
     */
    protected $userCharset;

    /**
     * @var string
     */
    protected $userIPAddress;

    /**
     * @var string
     */
    protected $userLanguage;

    /**
     * @var string
     */
    protected $userLocalTime;

    /**
     * @var string
     */
    protected $utmCampaign;

    /**
     * @var string
     */
    protected $webdesign;

    /**
     * @var string
     */
    protected $webdesignTime;

    /**
     * @var TrackingTSource
     */
    protected $tSource;

    /**
     * @param string $affiliateName
     */
    public function setAffiliateName ($affiliateName)
    {
        $this->affiliateName = $affiliateName;
    }

    /**
     * @return string
     */
    public function getAffiliateName ()
    {
        return $this->affiliateName;
    }

    /**
     * @param string $affiliateTime
     */
    public function setAffiliateTime ($affiliateTime)
    {
        $this->affiliateTime = $affiliateTime;
    }

    /**
     * @return string
     */
    public function getAffiliateTime ()
    {
        return $this->affiliateTime;
    }

    /**
     * @param string $campaignName
     */
    public function setCampaignName ($campaignName)
    {
        $this->campaignName = $campaignName;
    }

    /**
     * @return string
     */
    public function getCampaignName ()
    {
        return $this->campaignName;
    }

    /**
     * @param string $customerId
     */
    public function setCustomerId ($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getCustomerId ()
    {
        return $this->customerId;
    }

    /**
     * @param string $firstCustomerId
     */
    public function setFirstCustomerId ($firstCustomerId)
    {
        $this->firstCustomerId = $firstCustomerId;
    }

    /**
     * @return string
     */
    public function getFirstCustomerId ()
    {
        return $this->firstCustomerId;
    }

    /**
     * @param string $newCartFlag
     */
    public function setNewCartFlag ($newCartFlag)
    {
        $this->newCartFlag = $newCartFlag;
    }

    /**
     * @return string
     */
    public function getNewCartFlag ()
    {
        return $this->newCartFlag;
    }

    /**
     * @param string $refererUrl
     */
    public function setRefererUrl ($refererUrl)
    {
        $this->refererUrl = $refererUrl;
    }

    /**
     * @return string
     */
    public function getRefererUrl ()
    {
        return $this->refererUrl;
    }

    /**
     * @param string $rmsLocale
     */
    public function setRmsLocale ($rmsLocale)
    {
        $this->rmsLocale = $rmsLocale;
    }

    /**
     * @return string
     */
    public function getRmsLocale ()
    {
        return $this->rmsLocale;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent ($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getUserAgent ()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userCharset
     */
    public function setUserCharset ($userCharset)
    {
        $this->userCharset = $userCharset;
    }

    /**
     * @return string
     */
    public function getUserCharset ()
    {
        return $this->userCharset;
    }

    /**
     * @param string $userIPAddress
     */
    public function setUserIPAddress ($userIPAddress)
    {
        $this->userIPAddress = $userIPAddress;
    }

    /**
     * @return string
     */
    public function getUserIPAddress ()
    {
        return $this->userIPAddress;
    }

    /**
     * @param string $userLanguage
     */
    public function setUserLanguage ($userLanguage)
    {
        $this->userLanguage = $userLanguage;
    }

    /**
     * @return string
     */
    public function getUserLanguage ()
    {
        return $this->userLanguage;
    }

    /**
     * @param string $userLocalTime
     */
    public function setUserLocalTime ($userLocalTime)
    {
        $this->userLocalTime = $userLocalTime;
    }

    /**
     * @return string
     */
    public function getUserLocalTime ()
    {
        return $this->userLocalTime;
    }

    /**
     * @param string $utmCampaign
     */
    public function setUtmCampaign ($utmCampaign)
    {
        $this->utmCampaign = $utmCampaign;
    }

    /**
     * @return string
     */
    public function getUtmCampaign ()
    {
        return $this->utmCampaign;
    }

    /**
     * @param string $webdesign
     */
    public function setWebdesign ($webdesign)
    {
        $this->webdesign = $webdesign;
    }

    /**
     * @return string
     */
    public function getWebdesign ()
    {
        return $this->webdesign;
    }

    /**
     * @param string $webdesignTime
     */
    public function setWebdesignTime ($webdesignTime)
    {
        $this->webdesignTime = $webdesignTime;
    }

    /**
     * @return string
     */
    public function getWebdesignTime ()
    {
        return $this->webdesignTime;
    }

    /**
     * @param \API2Client\Entities\Order\TrackingTSource $tSource
     */
    public function setTSource (TrackingTSource $tSource)
    {
        $this->tSource = $tSource;
    }

    /**
     * @return \API2Client\Entities\Order\TrackingTSource
     */
    public function getTSource ()
    {
        return $this->tSource ? $this->tSource : new TrackingTSource ();
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        return array (
            'affiliateName'     => $this->getAffiliateName (),
            'affiliateTime'     => $this->getAffiliateTime (),
            'campaignName'      => $this->getCampaignName (),
            'customerId'        => $this->getCustomerId (),
            'firstCustomerId'   => $this->getFirstCustomerId (),
            'newCartFlag'       => $this->getNewCartFlag (),
            'refererUrl'        => $this->getRefererUrl (),
            'rmsLocale'         => $this->getRmsLocale (),
            'tSource'           => $this->getTSource ()->toArray (),
            'userAgent'         => $this->getUserAgent (),
            'userCharset'       => $this->getUserCharset (),
            'userIPAddress'     => $this->getUserIPAddress (),
            'userLanguage'      => $this->getUserLanguage (),
            'userLocalTime'     => $this->getUserLocalTime (),
            'utmCampaign'       => $this->getUtmCampaign (),
            'webdesign'         => $this->getWebdesign (),
            'webdesignTime'     => $this->getWebdesignTime (),
        );
    }
}