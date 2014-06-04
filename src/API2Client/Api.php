<?php

namespace API2Client;

use API2Client\Client\APIClient;
use API2Client\Client\Http\HttpClient;
use API2Client\Setters\TemplateFactory;

/**
 * Class Api
 * @package API2Client
 */
class Api
{
    /**
     * @var Client\APIClient
     */
    private $client;

    /**
     * @param $apiHost
     * @param $apiUser
     * @param $apiPassword
     */
    public function __construct ($apiHost, $apiUser, $apiPassword)
    {
        $this->client = new APIClient ();

        $this->client
            ->setApiHost ($apiHost)
            ->setApiUser ($apiUser)
            ->setApiPassword ($apiPassword);
    }

    /**
     * Return count of templates
     *
     * @throws ApiException
     * @return integer
     */
    public function getTemplatesCount ()
    {
        $response = $this
            ->client
            ->call ('templates.count', array (),  HttpClient::REQUEST_GET);

        if ( ! $response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        return $response->getResult ();
    }

    /**
     * Retrieve list of templates
     *
     * @param int $offset
     * @param int $limit
     * @param null $dateFrom
     * @param null $dateTo
     * @throws ApiException
     * @return mixed
     */
    public function getTemplatesList ($offset = 0, $limit = 20, $dateFrom = null, $dateTo = null)
    {
        $params = array ('start' => $offset, 'count' => $limit);

        if ($dateFrom !== null)
        {
            $params['from'] = $dateFrom;
        }

        if ($dateFrom !== null)
        {
            $params['to'] = $dateTo;
        }

        $response = $this
            ->client
            ->call ('templates.list', $params,  HttpClient::REQUEST_GET);

        if ( ! $response->isSuccess())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $templateFactory = new TemplateFactory ();

        $result = array ();

        foreach ($response->getResult () as $templateData)
        {
            $result[] = $templateFactory->create ($templateData);
        }

        return $result;
    }


    /**
     * Retrieve one template by ID
     *
     * @param $template_id
     * @return \API2Client\Entities\Template
     * @throws ApiException
     */
    public function getTemplate ($template_id)
    {
        $response = $this
            ->client
            ->call ('templates.item', array ('item_id' => $template_id),  HttpClient::REQUEST_GET);

        if ( ! $response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $template_factory = new TemplateFactory ();

        return $template_factory
            ->create ($response->getResult () [0]);
    }

    /**
     * Create Order
     */
    public function createOrder ()
    {

    }

    /**
     * Get order Status by Order ID
     */
    public function getOrderStatus ($order_id)
    {

    }
} 