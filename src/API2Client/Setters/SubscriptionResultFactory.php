<?php

namespace API2Client\Setters;


use API2Client\Entities\Subscription;
use API2Client\Entities\SubscriptionResult;


class SubscriptionResultFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return SubscriptionResult
     */
    public function create ($data)
    {
        $created = new SubscriptionResult ();
        
        $created->setRedirectUrl ($this->getValue ('redirect_url', $data, ''));
        $created->setPaymentReference ($this->getValue ('payment_reference', $data, ''));
        $created->setClientSecret ($this->getValue ('client_secret', $data, ''));
        $created->setStatus ($this->getValue ('status', $data, false));

        $dataSubscription = $this->getValue ('subscription', $data, array ());

        if ($dataSubscription)
        {
            $created->setSubscription ($this->createSubscriptionObject ($dataSubscription));
        }

        $messages = $this->getValue ('messages', $data, array());

        if ($messages)
        {
            $messages = $this->collectMessages ($messages);
            $created->setMessages ($messages);
        }


        return $created;
    }

    /**
     * @param $messages
     * @return array
     */
    private function collectMessages ($messages)
    {
        return array_map (function ($message) {
            return array_values ($message);
        }, $messages);
    }

    /**
     * @param $dataSubscription
     * @return Subscription
     */
    private function createSubscriptionObject ($dataSubscription)
    {
        $subscription = new Subscription ();

        return $subscription
            ->setId($this->getValue ('id', $dataSubscription, ''))
            ->setProjectId ($this->getValue ('project_id', $dataSubscription, null))
            ->setCurrencyId ($this->getValue ('currency_id', $dataSubscription, null))
            ->setStatus ($this->getValue ('status', $dataSubscription, 0))
            ->setStatusName ($this->getValue ('status_name', $dataSubscription, ''))
            ->setTitle ($this->getValue ('title', $dataSubscription, ''))
            ->setStart ($this->getValue ('start', $dataSubscription, ''))
            ->setPeriod ($this->getValue ('period', $dataSubscription, 0))
            ->setTerm ($this->getValue ('term', $dataSubscription, 0))
            ->setAmount ($this->getValue ('amount', $dataSubscription, 0))
            ->setInitAmount ($this->getValue ('init_amount', $dataSubscription, 0))
            ->setPaymentSystemId ($this->getValue ('payment_system_id', $dataSubscription, null))
            ->setCurrencyId ($this->getValue ('currency_id', $dataSubscription, null))
            ->setCustomerEmail ($this->getValue ('customer_email', $dataSubscription, ''))
            ->setCustomerFullname ($this->getValue ('customer_fullname', $dataSubscription, ''))
            ->setCustomerAddress ($this->getValue ('customer_address', $dataSubscription, ''))
            ->setCustomerCountryCode ($this->getValue ('customer_country_code', $dataSubscription, ''))
            ->setCustomerPhone ($this->getValue ('customer_phone', $dataSubscription, ''))
            ->setCustomerStateCode ($this->getValue ('customer_state_code', $dataSubscription, ''))
            ->setCustomerCity ($this->getValue ('customer_city', $dataSubscription, ''))
            ->setCustomerZip ($this->getValue ('customer_zip', $dataSubscription, ''))
            ->setCustomerUserAgent($this->getValue ('customer_user_agent', $dataSubscription, ''))
            ->setCustomerIpAddress($this->getValue ('customer_ip_address', $dataSubscription, ''))
            ->setCustomerLocalTime ($this->getValue ('customer_local_time', $dataSubscription, ''))
            ->setAffiliateName($this->getValue ('affiliate_name', $dataSubscription, ''));
    }
}