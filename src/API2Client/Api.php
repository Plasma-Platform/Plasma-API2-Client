<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

include __DIR__ . '/ApiException.php';
include __DIR__ . '/Client/APIClient.php';
include __DIR__ . '/Client/APIException.php';
include __DIR__ . '/Client/APIResponse.php';
include __DIR__ . '/Client/Http/HttpClient.php';
include __DIR__ . '/Client/Http/HttpClientException.php';
include __DIR__ . '/Entities/Order.php';
include __DIR__ . '/Entities/OrderCreated.php';
include __DIR__ . '/Entities/OrderItem.php';
include __DIR__ . '/Entities/Order/Additional/AdditionalInfoInterface.php';
include __DIR__ . '/Entities/Order/Additional/ProductOffer.php';
include __DIR__ . '/Entities/Order/BillingInfo.php';
include __DIR__ . '/Entities/Order/Currency.php';
include __DIR__ . '/Entities/Order/DiscountInfo.php';
include __DIR__ . '/Entities/Order/Links.php';
include __DIR__ . '/Entities/Order/Payment.php';
include __DIR__ . '/Entities/Order/PaymentInfo.php';
include __DIR__ . '/Entities/Order/ProductInfo.php';
include __DIR__ . '/Entities/Order/Status.php';
include __DIR__ . '/Entities/Order/TrackingInfo.php';
include __DIR__ . '/Entities/Order/TrackingTSource.php';
include __DIR__ . '/Entities/Template.php';
include __DIR__ . '/Entities/Template/Author.php';
include __DIR__ . '/Entities/Template/Category.php';
include __DIR__ . '/Entities/Template/Page.php';
include __DIR__ . '/Entities/Template/PageScreenShot.php';
include __DIR__ . '/Entities/Template/Property.php';
include __DIR__ . '/Entities/Template/ScreenShot.php';
include __DIR__ . '/Entities/Template/Style.php';
include __DIR__ . '/Entities/Template/Type.php';
include __DIR__ . '/Setters/FactoryAbstract.php';
include __DIR__ . '/Setters/FactoryInterface.php';
include __DIR__ . '/Setters/OrderCreatedFactory.php';
include __DIR__ . '/Setters/OrderCurrencyFactory.php';
include __DIR__ . '/Setters/OrderItemFactory.php';
include __DIR__ . '/Setters/OrderLinksFactory.php';
include __DIR__ . '/Setters/OrderPaymentFactory.php';
include __DIR__ . '/Setters/OrderStatusFactory.php';
include __DIR__ . '/Setters/OrderStatusesFactory.php';
include __DIR__ . '/Setters/TemplateFactory.php';

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
            ->create (current ($response->getResult ()));
    }

    /**
     * Create Order
     *
     * @param Entities\Order $order
     * @throws ApiException
     * @return \API2Client\Entities\OrderCreated
     */
    public function createOrder (Order $order)
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
} 