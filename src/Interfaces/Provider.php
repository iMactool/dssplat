<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Dssplat\Interfaces;

use Imactool\Dssplat\Core\Container;

interface Provider
{
    public function serviceProvider(Container $container);
}