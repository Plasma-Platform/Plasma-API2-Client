<?php

namespace API2Client\Setters;

use API2Client\Entities\Order\BillingPortal;

class BillingPortalFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * Create Entity Object from array
     *
     * @param array $data
     * @return BillingPortal
     */
    public function create($data)
    {
        $portal = new BillingPortal();
        $portal->setUrl($this->getValue('url', $data, null));
        $portal->setStatus((bool)$this->getValue('status', $data, false));
        $messages = $this->getValue('messages', $data, array());

        if (is_array($messages) && !empty($messages)) {
            $portal->setMessages($messages);
        }

        return $portal;
    }
}
