<?php

namespace MeeeetDev\Shiprocket;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MeeeetDev\Shiprocket\ShiprocketApi
 */
class Shiprocket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shiprocket';
    }
}
