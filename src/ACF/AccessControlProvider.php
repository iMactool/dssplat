<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 门禁设施
 *  ======================================================.
 */

namespace Imactool\Dssplat\ACF;

use Imactool\Dssplat\Core\Container;
use Imactool\Dssplat\Interfaces\Provider;

class AccessControlProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['ACF'] = function ($container) {
            return new AccessControl($container);
        };
    }
}
