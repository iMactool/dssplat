<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================.
 */

namespace Imactool\Dssplat;

use Imactool\Dssplat\ACF\AccessControlProvider;
use Imactool\Dssplat\ACF\VideoIntercomProvider;
use Imactool\Dssplat\Auth\AuthProvider;
use Imactool\Dssplat\Core\ContainerBase;
use Imactool\Dssplat\Org\OrgProvider;
use Imactool\Dssplat\Support\Config;

class DssPlat extends ContainerBase
{
    protected $config;

    /**
     * 配置服务提供者.
     *
     * @var string[]
     */
    protected $provider = [
        AuthProvider::class,
        OrgProvider::class,
        AccessControlProvider::class,
        VideoIntercomProvider::class,

    ];

    public function __construct(array $config = [])
    {
        $this->config = new Config($config);
        parent::__construct();
        $this->setConfig($config);
    }

    public function getConfig()
    {
        return $this->config;
    }
}
