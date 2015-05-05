<?php
/***********************************************************************************************************************
 * @author: <kolomiets.dev@gmail.com> 
 **********************************************************************************************************************/

namespace API2Client\Setters;


use API2Client\Entities\Order\Links;

class OrderLinksFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * Create Entity Object from array
     *
     * @param array $data
     * @return mixed
     */
    public function create ($data)
    {
        $links = new Links ();
        $links->setStatus ($this->getValue ('status', $data, ''));
        $links->setLinks ($this->getValue ('links', $data, ''));
        $links->setFinishDate ($this->getValue ('finishDate', $data));

        return $links;
    }
}