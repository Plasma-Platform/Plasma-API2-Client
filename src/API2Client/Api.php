<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client;

use API2Client\Client\APIClient;
use API2Client\Client\Http\HttpClient;
use API2Client\Setters\OrderCreatedFactory;
use API2Client\Setters\OrderPaymentFactory;
use API2Client\Setters\OrderStatusFactory;
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

        if (!$response->isSuccess ())
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

        if (!$response->isSuccess())
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

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $template_factory = new TemplateFactory ();

        return $template_factory
            ->create ($response->getResult () [0]);
    }

    /**
     * Create Order
     *
     * @param Entities\Order $order
     * @throws ApiException
     * @return \API2Client\Entities\OrderCreated
     */
    public function createOrder (Entities\Order $order)
    {
        $response = $this
            ->client
            ->call ('orders.create', $order->toArray (),  HttpClient::REQUEST_RAW);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $orderCreated = new OrderCreatedFactory ();

        return $orderCreated
            ->create ($response->getResult ());
    }

    /**
     * Get order Status by Order ID
     *
     * @param string $order_id
     * @throws ApiException
     * @return \API2Client\Entities\Order\Status
     */
    public function getOrderStatus ($order_id)
    {
        $response = $this
            ->client
            ->call ('orders.status',  array ('order_id' => $order_id),  HttpClient::REQUEST_GET);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $orderStatus = new OrderStatusFactory ();

        return $orderStatus
            ->create ($response->getResult ());
    }

    /**
     * Get order payments list
     *
     * @param int $start
     * @param int $count
     * @return array
     * @throws ApiException
     */
    public function getOrderPayments ($start = 0, $count = 10)
    {
        $response = $this
            ->client
            ->call ('orders.payments',  array ('start' => $start, 'count' => $count),  HttpClient::REQUEST_GET);

        if (!$response->isSuccess ()) {
            throw new ApiException ($response->getErrorMessage ());
        }

        $orderPayments = new OrderPaymentFactory ();
        $result = array ();

        foreach ($response->getResult () as $paymentData) {
            $result[] = $orderPayments->create ($paymentData);
        }

        return $result;
    }
} 