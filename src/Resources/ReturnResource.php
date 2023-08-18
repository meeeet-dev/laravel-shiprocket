<?php

namespace MeeeetDev\Shiprocket\Resources;

class ReturnResource extends Resource
{
    /**
     * Create a Return Order
     *
     * @param array $order
     * @return mixed
     */
    public function create(array $order)
    {
        $endpoint = 'orders/create/return';

        return $this->postRequest($endpoint, $order);
    }

    /**
     * Get All Return Orders
     * 
     * Use this API to do multiple tasks in one go, namely getting order,
     * just pass parameter and u will get result
     * https://apidocs.shiprocket.in/#a98c37b1-47ac-40b4-b80f-051611fe350e
     * @param array $param
     * @return mixed
     */
    public function getOrders(array $param)
    {
        $endpoint = 'orders/processing/return';
        if ($param) {
            $endpoint = $endpoint . '?' .  http_build_query($param);
        }

        return $this->getRequest($endpoint, $param);
    }

    /**
     * Check the Serviceability for local pincode
     *
     * @param array $data
     * @return mixed
     */
    public function checkServiceability(array $data)
    {
        $data['is_return'] = 1;

        $endpoint = 'courier/serviceability/?' . http_build_query($data);

        return $this->getRequest($endpoint);
    }

    /**
     * Generate AWB for specific order
     *
     * @param array $data
     * @return mixed
     */
    public function generateAWB(array $data)
    {
        $data['is_return'] = 1;

        $endpoint = 'courier/assign/awb';

        return $this->postRequest($endpoint, $data);
    }
}
