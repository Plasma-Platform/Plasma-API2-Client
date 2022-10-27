<?php

namespace API2Client\Setters;

use API2Client\Entities\Order\CustomerPortal;

class CustomerPortalFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * Create Entity Object from array
     *
     * @param array $data
     * @return CustomerPortal
     */
    public function create($data)
    {
        $portal = new CustomerPortal();
        $portal->setLink($this->getValue('link', $data, null));

        return $portal;
    }
}