<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================.
 */

namespace Imactool\Dssplat\Auth;

use Imactool\Dssplat\Core\Container;
use Imactool\Dssplat\Interfaces\Provider;

class AuthProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Auth'] = function ($container) {
            return new Auth($container);
        };
    }
}
