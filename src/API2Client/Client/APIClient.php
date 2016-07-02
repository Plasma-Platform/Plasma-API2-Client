<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Client;


use API2Client\Client\Http\HttpClient;

class APIClient
{
    const DATA_FORMAT = 'json';

    const API_VERSION = 'v2';

    /**
     * Base API host
     * @var string
     */
    protected $apiHost;

    /**
     * @var string
     */
    protected $apiUser;

    /**
     * @var string
     */
    protected $apiPassword;

    /**
     * @var Http\HttpClient
     */
    protected $httpClient;


    public function __construct ()
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * Make API Call
     *
     * @param $apiMethod
     * @param array $params
     * @param int $method
     * @return APIResponse
     */
    public function call ($apiMethod, $params = array (), $method = HttpClient::REQUEST_GET)
    {
        $resultContent = $this->httpClient->request ($this->getAuthorizedUrl ($apiMethod), $params, $method);


        $response = new APIResponse ();
        $response->create ($resultContent);

        return $response;
    }

    protected function getAuthorizedUrl ($apiMethod)
    {
        return 'http://'
            . $this->apiHost
            . $this->getMethodPath ($apiMethod)
            . '?'
            . http_build_query (array ('user' => $this->apiUser, 'token' => $this->apiPassword));
    }

    /**
     * Return url path by method
     * @param $apiMethod
     * @return string
     */
    protected function getMethodPath ($apiMethod)
    {
        return '/' . self::API_VERSION . '/' . $apiMethod . '.' . self::DATA_FORMAT;
    }


    /**
     * @param string $apiUser
     * @return $this
     */
    public function setApiUser ($apiUser)
    {
        $this->apiUser = $apiUser;

        return $this;
    }

    /**
     * @param string $apiUser
     * @return $this
     */
    public function setApiPassword ($apiUser)
    {
        $this->apiPassword = $apiUser;

        return $this;
    }

    /**
     * @param string $apiUser
     * @return $this
     */
    public function setApiHost ($apiUser)
    {
        $this->apiHost = $apiUser;

        return $this;
    }
}