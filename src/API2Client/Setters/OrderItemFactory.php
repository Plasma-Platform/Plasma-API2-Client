<?php
/***********************************************************************************************************************
 *
 * Author kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class OrderItemFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return OrderItem
     */
    public function create ($data)
    {
        $order = new OrderItem ();

        $order->setStatusCode($this->getValue ('status_code', $data, 0));
        $order->setStatusName($this->getValue ('status_name', $data, 0));
        $order->setAmount($this->getValue ('amount', $data, 0));
        $order->setCurrency($this->getValue ('currency', $data, 0));
        $order->setEmail($this->getValue ('email', $data, 0));
        $order->setMerchantMethodId($this->getValue ('merchant_method_id', $data, 0));
        $order->setMerchantTransactionId($this->getValue ('merchant_transaction_id', $data, ''));


        foreach ($this->getValue ('productInfoList', $data, array ()) as $product)
        {
            $productInfo = new ProductInfo ();
            $productInfo->setName ($this->getValue ('name', $product, ''));
            $productInfo->setPrice ($this->getValue ('price', $product, 0));
            $productInfo->setProductId ($this->getValue ('productId', $product, 0));
            $productInfo->setType ($this->getValue ('type', $product, ''));

            $order->addProductInfo ($productInfo);
        }

        return $order;
    }
}