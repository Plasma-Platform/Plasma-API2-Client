<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class ProductInfo
{
    /**
     * @var array
     */
    protected $discountCodeList = array ();

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $productId;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var AdditionalInfoInterface
     */
    protected $additionalInfo;

    /**
     * @param string $discountCode
     */
    public function addDiscountCode ($discountCode)
    {
        $this->discountCodeList[] = $discountCode;
    }

    /**
     * @return array
     */
    public function getDiscountCodeList ()
    {
        return $this->discountCodeList;
    }

    /**
     * @param AdditionalInfoInterface $additionalInfo
     */
    public function setAdditionalInfo (AdditionalInfoInterface $additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return AdditionalInfoInterface
     */
    public function getAdditionalInfo ()
    {
        return $this->additionalInfo;
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
     * @param int $productId
     */
    public function setProductId ($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getProductId ()
    {
        return $this->productId;
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
     * @return mixed
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName ($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }


    public function toArray ()
    {
        return array (
            'additionalInfo'    => $this->getAdditionalInfo () ? $this->getAdditionalInfo ()->toArray () : array (),
            'description'       => $this->getDescription (),
            'discountCodeList'  => $this->getDiscountCodeList (),
            'name'              => $this->getName (),
            'price'             => $this->getPrice (),
            'productId'         => $this->getProductId () ? $this->getProductId () : 0,
            'type'              => $this->getType (),
        );
    }
}