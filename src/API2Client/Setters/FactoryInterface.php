<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

interface FactoryInterface
{
    /**
     * Create Entity Object from array
     *
     * @param array $data
     * @return mixed
     */
    public function create ($data);
}