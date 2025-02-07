<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;


use DateTime;

class FactoryAbstract
{

    /**
     * Get value by key (field name)
     *
     * @param $key_name
     * @param $data
     * @param null $default
     * @return null
     */
    public function getValue ($key_name, $data, $default = null)
    {
        if (array_key_exists ($key_name, $data))
        {
            return $data[$key_name];
        }

        return $default;
    }


    /**
     * Create Date from string by format
     *
     * @param $string
     * @param $format
     * @param null $default
     * @return DateTime|null
     */
    public function createDateFromString ($string, $format, $default=null)
    {
        if ($date = DateTime::createFromFormat ($format, $string))
        {
            return $date;
        }

        return $default;
    }
} 
