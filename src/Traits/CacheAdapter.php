<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */

namespace Imactool\Dssplat\Traits;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

trait CacheAdapter
{
    private static $instance;
    //TODO 支持 Redis

    public static function getInstance()
    {
        if (!self::$instance){
            self::$instance = new FilesystemAdapter();
        }
        return self::$instance;
    }
}