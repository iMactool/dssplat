<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 组织管理服务
 *  ======================================================
 */

namespace Imactool\Dssplat\Org;

use Imactool\Dssplat\Core\Container;
use Imactool\Dssplat\Interfaces\Provider;

class OrgProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Org'] = function (Container $container){
            return new Org($container);
        };
    }
}