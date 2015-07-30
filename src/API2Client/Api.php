<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

$dir = dirname (__FILE__);

include $dir . '/ApiException.php';
include $dir . '/Client/APIClient.php';
include $dir . '/Client/APIException.php';
include $dir . '/Client/APIResponse.php';
include $dir . '/Client/Http/HttpClient.php';
include $dir . '/Client/Http/HttpClientException.php';
include $dir . '/Entities/Order.php';
include $dir . '/Entities/OrderCreated.php';
include $dir . '/Entities/OrderItem.php';
include $dir . '/Entities/Order/Additional/AdditionalInfoInterface.php';
include $dir . '/Entities/Order/Additional/ProductOffer.php';
include $dir . '/Entities/Order/BillingInfo.php';
include $dir . '/Entities/Order/Currency.php';
include $dir . '/Entities/Order/DiscountInfo.php';
include $dir . '/Entities/Order/Links.php';
include $dir . '/Entities/Order/Payment.php';
include $dir . '/Entities/Order/PaymentInfo.php';
include $dir . '/Entities/Order/ProductInfo.php';
include $dir . '/Entities/Order/Status.php';
include $dir . '/Entities/Order/TrackingInfo.php';
include $dir . '/Entities/Order/TrackingTSource.php';
include $dir . '/Entities/Template.php';
include $dir . '/Entities/Template/Author.php';
include $dir . '/Entities/Template/Category.php';
include $dir . '/Entities/Template/Page.php';
include $dir . '/Entities/Template/PageScreenShot.php';
include $dir . '/Entities/Template/Property.php';
include $dir . '/Entities/Template/ScreenShot.php';
include $dir . '/Entities/Template/Style.php';
include $dir . '/Entities/Template/Type.php';
include $dir . '/Setters/FactoryAbstract.php';
include $dir . '/Setters/FactoryInterface.php';
include $dir . '/Setters/OrderCreatedFactory.php';
include $dir . '/Setters/OrderCurrencyFactory.php';
include $dir . '/Setters/OrderItemFactory.php';
include $dir . '/Setters/OrderLinksFactory.php';
include $dir . '/Setters/OrderPaymentFactory.php';
include $dir . '/Setters/OrderStatusFactory.php';
include $dir . '/Setters/OrderStatusesFactory.php';
include $dir . '/Setters/TemplateFactory.php';

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