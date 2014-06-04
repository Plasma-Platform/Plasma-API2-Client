<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Client;


class APIResponse
{
    protected $errorCode    = 0;
    protected $errorMessage = 0;

    /**
     * @var array|null
     */
    protected $body;

    /**
     * @return bool
     */
    public function isSuccess ()
    {
        return $this->getErrorCode() == 0;
    }

    public function create ($responseString)
    {
        $this->body = json_decode($responseString, true);

        if (json_last_error())
        {
            throw new APIException (json_last_error_msg ());
        }
    }

    /**
     * Return response result
     *
     * @return mixed
     */
    public function getResult ()
    {
        if (isset ($this->body['result']))
        {
            return $this->body['result'];
        }

        return null;
    }

    /**
     * return response error code
     *
     * @return int
     */
    public function getErrorCode ()
    {
        if (isset ($this->body['error_code']))
        {
            return $this->body['error_code'];
        }

        return 0;
    }

    /**
     * return response error message
     *
     * @return string
     */
    public function getErrorMessage ()
    {
        if (isset ($this->body['error_message']))
        {
            return $this->body['error_message'];
        }

        return '';
    }

} 