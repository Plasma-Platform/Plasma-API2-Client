TemplateMonster API2 Client
===========================

Installation
------------

 Using Composer (recommended)

Add the dependency in  your `composer.json`

``` json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/M0nsterLabs/api2client.git"
        }
    ],
    "require": {
        "templatemonster/api2-client":"dev-master"
    }
}

```
Usage
-----

# Templates

```php
// Create API instance
$api = new \API2Client\Api ('api2.templatemonster.com', 'myUserName', 'myUserToken');


// Receive a count of all Templates
$templatesCount = $api->getTemplatesCount ()

// Receive a list of Templates
$offset = 0;
$limit  = 20;

$templates = $api->getTemplatesList ($offset, $limit);

/** @var API2Client\Entities\Template $template  */
foreach ($templates as $template)
{
    // Template pages
    $templatePages =  $template->getPages ();
}


// Receive a single Template
$template_id = 30506;

/** @var API2Client\Entities\Template $template */
$template = $api->getTemplate ($template_id);


```

# Orders

## Receive a status of Order

``` php

/** @var \API2Client\Entities\Order\Status $status */
$status  = $api->getOrderStatus ('rgRvuzZQP9OoALyEKGKA');

// print status title
echo $status->getStatusName ();

```

## Get all Statuses

```php

$statuses = $api->getOrderStatuses ();

/** @var \API2Client\Entities\Order\Status  $status */
foreach ($statuses as $status)
{
    echo $status->getStatusCode ();
    echo $status->getStatusName ();
}

```

## Create an Order

``` php

$order = new \API2Client\Entities\Order ();

$order->setProjectId        (0);
$order->setAmount           (174);
$order->setBonusesAmount    (0);

$billingInfo = new \API2Client\Entities\Order\BillingInfo ();

$billingInfo->setAccountSId     ('u03e9b361c607ju37707iyo8s273sibh9z8lka2e6kt3276e41g11e7f6ozjm0cv7c4a40piorf408bb203of6wnbx2v24xfo61nwr4o7960tu898w50u4bu51zn2fa1');
$billingInfo->setAddress        ('Torenplein Str');
$billingInfo->setCityName       ('Hasselt');
$billingInfo->setContactPhone   (74933242323);
$billingInfo->setEmail          ('mark.twain@mail.com');
$billingInfo->setCountryISO2    ('BE');
$billingInfo->setFullName       ('Mark Twain');
$billingInfo->setPhone          (74933242323);
$billingInfo->setPostalCode     (12123);
$billingInfo->setStateISO2      ('XX');

$order->setBillingInfo ($billingInfo);

$productInfo1 = new \API2Client\Entities\Order\ProductInfo ();

$productInfo1->setProductId (49334);
$productInfo1->setPrice     (69);
$productInfo1->setType      ('template');

$order->addProductInfo ($productInfo1);

$productInfo2 = new \API2Client\Entities\Order\ProductInfo ();

$productInfo2->setProductId (49334);
$productInfo2->setPrice     (75);
$productInfo2->setType      ('template');

$order->addProductInfo ($productInfo2);


$externalProduct = new \API2Client\Entities\Order\ProductInfo ();

$externalProduct->setProductId  (0);
$externalProduct->setPrice      (33);
$externalProduct->setFinalPrice (30);
$externalProduct->setName       ('Headspace Journey Subscription');
$externalProduct->setType       ('external');

$order->addProductInfo ($externalProduct);

$trackingInfo = new \API2Client\Entities\Order\TrackingInfo ();

$trackingInfo->setRmsLocale     ('EN');
$trackingInfo->setRefererUrl    ('http://localhost:8081/');
$trackingInfo->setUserAgent     ('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36');
$trackingInfo->setUserIPAddress ('10.0.2.2');
$trackingInfo->setUserLanguage  ('en-US,en;q=0.8,uk;q=0.6,ru;q=0.4');
$trackingInfo->setUserLocalTime ('Tue May 27 2014 10:31:05 GMT+0300 (EEST)');
$trackingInfo->setTrackers (array(
    "ga" => "GA1.1.1479631296.1738839056"
));

$order->setTrackingInfo ($trackingInfo);

$paymentInfo = new \API2Client\Entities\Order\PaymentInfo ();

$paymentInfo->setCurrencyId     (0);
$paymentInfo->setCurrencyRate   (1);
$paymentInfo->setPaymentId      (2);

$order->setPaymentInfo ($paymentInfo);

/** @var \API2Client\Entities\OrderCreated $result */
$result = $api->createOrder ($order);


```

## Get customer management portal link

```php
// Create API instance
$api = new \API2Client\Api ('api2.templatemonster.com', 'myUserName', 'myUserToken');
$subscriptionId = 'abc12345678';
$link = $api->getCustomerManagementPortalLink($subscriptionId);

```
Success response
```php
API2Client\Entities\Order\CustomerPortal Object
(
    [link:protected] => https://billing.stripe.com/p/session/test_YWNjdF8VGb1NE
    [status:API2Client\Entities\Order\CustomerPortal:private] => 1
    [messages:API2Client\Entities\Order\CustomerPortal:private] => Array()
)
```

Response if not exist subscriptions 
```php
API2Client\Entities\Order\CustomerPortal Object
(
    [link:protected] =>
    [status:API2Client\Entities\Order\CustomerPortal:private] =>
    [messages:API2Client\Entities\Order\CustomerPortal:private] => Array
        (
            [0] => Subscription does not exists
        )
)
```

Response if payment method not supported customer management portal
```php
API2Client\Entities\Order\CustomerPortal Object
(
    [link:protected] =>
    [status:API2Client\Entities\Order\CustomerPortal:private] =>
    [messages:API2Client\Entities\Order\CustomerPortal:private] => Array
        (
            [0] => Payment method not supported customer management portal
        )
)
```

## Get url on invoice url by transaction

```php
// Create API instance
$api = new \API2Client\Api ('api2.templatemonster.com', 'myUserName', 'myUserToken');
$link = $api->getInvoiceUrl('abc12345678');
```
Success response
```php
API2Client\Entities\Order\BillingPortal Object
(
    [url:protected] => https://www.domain.com/invoice/a1?token=token
    [status:API2Client\Entities\Order\BillingPortal:private] => 1
    [messages:API2Client\Entities\Order\BillingPortal:private] => Array()
)
```

## Get url on status page url by transaction

```php
// Create API instance
$api = new \API2Client\Api ('api2.templatemonster.com', 'myUserName', 'myUserToken');
$link = $api->getTransactionStatusUrl('abc12345678');
```
Success response
```php
API2Client\Entities\Order\BillingPortal Object
(
    [url:protected] => https://www.domain.com/transaction-statuses/a1?token=token
    [status:API2Client\Entities\Order\BillingPortal:private] => 1
    [messages:API2Client\Entities\Order\BillingPortal:private] => Array()
)
```

Error Handling
--------------

``` php

try
{
    $templatesCount = $api->getTemplatesCount ()
}
catch (\API2Client\ApiException $e)
{
    // API Error
    $e->getMessage ();
}
catch (\API2Client\Client\APIException $e)
{
    // HTTP Client Error
    $e->getMessage ();
}

```
