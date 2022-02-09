<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 可视对讲类
 *  ======================================================
 */
namespace Imactool\Dssplat\ACF;

use Imactool\Dssplat\Core\Container;
use Imactool\Dssplat\Interfaces\Provider;

class VideoIntercomProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Vims'] = function ($container){
            return new VideoIntercom($container);
        };
    }
}