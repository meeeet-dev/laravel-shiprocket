<?php

namespace MeeeetDev\Shiprocket\Traits;

use MeeeetDev\Shiprocket\Clients\Client;
use MeeeetDev\Shiprocket\Exceptions\ShiprocketException;

trait Authenticate
{
    public function auth(Client $client, $credentials = null)
    {
        if (! $credentials) {
            $credentials = config('shiprocket.credentials');
        }

        if (! is_array($credentials) || empty($credentials['email']) || empty($credentials['password'])) {
            throw new ShiprocketException('Invalid Credentials');
        }

        $endpoint = 'auth/login';

        $authDetails = $client->setEndpoint($endpoint)
            ->setHeaders('login')
            ->post($credentials);

        return $authDetails;
    }
}
