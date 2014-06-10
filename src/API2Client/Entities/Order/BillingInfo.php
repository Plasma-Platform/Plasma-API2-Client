<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Entities\Order;


class BillingInfo
{
    /**
     * @var string
     */
    protected $accountSId;

    /**
     * @var string
     */

    protected $address;

    /**
     * @var string
     */

    protected $cityName;

    /**
     * @var string
     */
    protected $contactPhone;

    /**
     * @var string
     */
    protected $countryISO2;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $stateISO2;

    /**
     * @param string $accountSId
     */
    public function setAccountSId ($accountSId)
    {
        $this->accountSId = $accountSId;
    }

    /**
     * @return string
     */
    public function getAccountSId ()
    {
        return $this->accountSId;
    }

    /**
     * @param string $address
     */
    public function setAddress ($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress ()
    {
        return $this->address;
    }

    /**
     * @param string $cityName
     */
    public function setCityName ($cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * @return string
     */
    public function getCityName ()
    {
        return $this->cityName;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone ($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return string
     */
    public function getContactPhone ()
    {
        return $this->contactPhone;
    }

    /**
     * @param string $countryISO2
     */
    public function setCountryISO2 ($countryISO2)
    {
        $this->countryISO2 = $countryISO2;
    }

    /**
     * @return string
     */
    public function getCountryISO2 ()
    {
        return $this->countryISO2;
    }

    /**
     * @param string $email
     */
    public function setEmail ($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @param string $fullName
     */
    public function setFullName ($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getFullName ()
    {
        return $this->fullName;
    }

    /**
     * @param string $phone
     */
    public function setPhone ($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone ()
    {
        return $this->phone;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode ($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getPostalCode ()
    {
        return $this->postalCode;
    }

    /**
     * @param string $stateISO2
     */
    public function setStateISO2 ($stateISO2)
    {
        $this->stateISO2 = $stateISO2;
    }

    /**
     * @return string
     */
    public function getStateISO2 ()
    {
        return $this->stateISO2;
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        return array (
            'accountSId'    => $this->getAccountSId (),
            'address'       => $this->getAddress (),
            'cityName'      => $this->getCityName (),
            'contactPhone'  => $this->getContactPhone (),
            'countryISO2'   => $this->getCountryISO2 (),
            'email'         => $this->getEmail (),
            'fullName'      => $this->getFullName (),
            'phone'         => $this->getPhone (),
            'postalCode'    => $this->getPostalCode (),
            'stateISO2'     => $this->getStateISO2 (),
        );
    }
}