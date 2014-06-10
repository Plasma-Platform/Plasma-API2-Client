<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Client\Http;


class HttpClient
{
    const REQUEST_GET   = 0;

    const REQUEST_POST  = 1;

    const REQUEST_RAW   = 2;

    /**
     * @var resource
     */
    private $curl;

    public function __construct ()
    {
        $this->curl = curl_init ();
    }

    /**
     * Set custom timeout
     *
     * @param $timeOut
     */
    public function setTimeout ($timeOut)
    {
        curl_setopt ($this->curl, CURLOPT_TIMEOUT, $timeOut);
    }

    /**
     * Make curl request
     *
     * @param $url
     * @param array $params
     * @param int $method
     * @throws HttpClientException
     * @return mixed
     */
    public function request ($url, $params = array(), $method)
    {
        curl_setopt ($this->curl, CURLOPT_RETURNTRANSFER, 1);

        $this->applyRequestMethod ($url, $method, $params);

        $response = curl_exec ($this->curl);

        if (curl_errno ($this->curl))
        {
            throw new HttpClientException ( curl_error ($this->curl));
        }

        return $response;
    }

    /**
     * Apply request method with data to cURL object
     *
     * @param $url
     * @param $method
     * @param $params
     * @throws HttpClientException
     */
    protected function applyRequestMethod ($url, $method, $params)
    {
        switch ($method)
        {
            case self::REQUEST_GET:
                curl_setopt ($this->curl, CURLOPT_URL, $url . '&' . http_build_query ($params));
                curl_setopt ($this->curl, CURLOPT_POST, 0);
                break;

            case self::REQUEST_POST:
                curl_setopt ($this->curl, CURLOPT_URL, $url);
                curl_setopt ($this->curl, CURLOPT_POST, 1);
                curl_setopt ($this->curl, CURLOPT_POSTFIELDS, $params);
                break;

            case self::REQUEST_RAW:
                curl_setopt ($this->curl, CURLOPT_URL, $url);
                curl_setopt ($this->curl, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));
                curl_setopt ($this->curl, CURLOPT_POST, 1);

                $data = json_encode ($params);

                if (json_last_error () !== 0)
                {
                    throw new HttpClientException (json_last_error_msg ());
                }

                curl_setopt ($this->curl, CURLOPT_POSTFIELDS, $data);
                break;

            default:
                throw new HttpClientException ('Bad request method');
        }
    }
} 