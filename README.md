TemplateMonster API2 Client
===========================

Installation
------------

### Using Composer (recommended)

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
