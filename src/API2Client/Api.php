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
use API2Client\Entities\Subscription;
use API2Client\Setters\OrderCreatedFactory;
use API2Client\Setters\OrderCurrencyFactory;
use API2Client\Setters\OrderItemFactory;
use API2Client\Setters\OrderLinksFactory;
use API2Client\Setters\OrderStatusesFactory;
use API2Client\Setters\OrderPaymentFactory;
use API2Client\Setters\OrderStatusFactory;
use API2Client\Setters\SubscriptionCreatedFactory;
use API2Client\Setters\SubscriptionResultFactory;
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
     * @param array $properties
     * @return mixed
     * @throws ApiException
     */
    public function getTemplatesList ($offset = 0, $limit = 20, $dateFrom = null, $dateTo = null, $properties = array ())
    {
        $params = array ('start' => $offset, 'count' => $limit);

        if ($properties)
        {
            $params['properties'] = join(',', $properties);
        }

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
     * Get order Links
     *
     * @param string $order_id
     * @param string $template_id
     * @throws ApiException
     * @return \API2Client\Entities\Order\Links
     */
    public function getOrderLinks ($order_id, $template_id)
    {
        $response = $this
            ->client
            ->call ('orders.links',  array ('order_id' => $order_id, 'template_id' => $template_id),  HttpClient::REQUEST_GET);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $factory = new OrderLinksFactory ();

        return $factory
            ->create ($response->getResult ());
    }

    /**
     * Get all Statuses
     *
     * @throws ApiException
     * @return array [\API2Client\Entities\Order\Status]
     */
    public function getOrder ($order_id)
    {
        $response = $this
            ->client
            ->call ('orders.item',  array ('order_id' => $order_id),  HttpClient::REQUEST_GET);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }
        $factory = new OrderItemFactory ();

        return $factory
            ->create ($response->getResult ());
    }

    /**
     * Get all Statuses
     *
     * @throws ApiException
     * @return array [\API2Client\Entities\Order\Status]
     */
    public function getOrderStatuses ()
    {
        $response = $this
            ->client
            ->call ('orders.statuses',  array (),  HttpClient::REQUEST_GET);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $orderStatuses = new OrderStatusesFactory ();

        return $orderStatuses
            ->create ($response->getResult ());
    }

    /**
     * Get payments list
     *
     * @return array
     * @throws ApiException
     */
    public function getPaymentMethods ()
    {
        $response = $this
            ->client
            ->call ('orders.payments');

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $orderPayments = new OrderPaymentFactory ();
        $result = array ();

        foreach ($response->getResult () as $paymentData)
        {
            $result[] = $orderPayments->create ($paymentData);
        }

        return $result;
    }

    /**
     * Get currencies list
     *
     * @return array
     * @throws ApiException
     */
    public function getCurrencies ()
    {
        $response = $this
            ->client
            ->call ('orders.currencies');

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $currency = new OrderCurrencyFactory ();
        $result = array ();

        foreach ($response->getResult () as $currencyData)
        {
            $result[] = $currency->create ($currencyData);
        }

        return $result;
    }

    /**
     * @param Subscription $subscription
     * @return Entities\SubscriptionResult
     * @throws ApiException
     */
    public function createPaymentSubscription (Subscription $subscription)
    {
        $response = $this
            ->client
            ->call ('orders.subscribe', $subscription->toArray (),  HttpClient::REQUEST_RAW);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $subscription = new SubscriptionResultFactory();

        return $subscription
            ->create ($response->getResult ());
    }

    /**
     * @param $id
     * @return Entities\SubscriptionCreated
     * @throws ApiException
     */
    public function cancelPaymentSubscription ($id)
    {
        $response = $this
            ->client
            ->call ('orders.unsubscribe', array ('id' => $id),  HttpClient::REQUEST_RAW);

        if (!$response->isSuccess ())
        {
            throw new ApiException ($response->getErrorMessage ());
        }

        $subscription = new SubscriptionResultFactory ();

        return $subscription
            ->create ($response->getResult ());
    }
} 