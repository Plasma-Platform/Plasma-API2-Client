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
        $portal->setStatus($this->getValue('status', $data, false));
        $messages = $this->getValue('messages', $data, array());

        if (is_array($messages) && !empty($messages)) {
            $portal->setMessages($messages);
        }

        return $portal;
    }
}