<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Dssplat\Core;

use Imactool\Dssplat\Http\Http;
use Imactool\Dssplat\Support\Config;

class BaseService
{
    protected $app;
    public static $client;
    protected static $config;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->setConfig($app->getConfig());
    }

    public function setConfig($config)
    {
        if (is_null(self::$config)){
            self::$config = $config;
        }else{
            self::$config = array_merge(self::$config,$config);
        }
    }

    /**
     * 以字符串 获取URL 参数
     * @return string
     * @author cc
     */
    protected function queryString()
    {
        return 'userId='.self::$config['userId'].'&userName='.self::$config['loginName'].'&token='.self::$config['token'];
    }

    /**
     * 以数组形式 获取URL 参数
     * @return array
     * @author cc
     */
    protected function queryArr(array $params = [])
    {
        $arr =  [
            'userId'   => self::$config['userId'],
            'userName' => self::$config['loginName'],
            'token'    => self::$config['token']
        ];
        return array_merge($arr ,$params);
    }

    public function headerJson()
    {
        return ['Content-type'=>'application/json'];
    }

    protected function getUrl()
    {
        return 'http://'.self::$config['ip'].':'.self::$config['port'];
    }

    public function httpClient()
    {
        if (!self::$client){
            self::$client = new Http();
            self::$client->setUrl($this->getUrl());
        }
        return self::$client;
    }

    /**
     * 发送 get 请求
     *
     * @param string $endpoint
     * @param array  $query
     * @param array  $headers
     *
     * @return mixed
     */
    public function get($endpoint, $query = [], $headers = [])
    {
//        $query = $this->generateParams($endpoint, $query);
        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    /**
     * 发送 post 请求
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return mixed
     */
    public function post($endpoint, $params = [], $headers = [])
    {
//        $params = $this->generateParams($endpoint, $params);

        return $this->httpClient()->request('post', $endpoint, [
            'header' => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * 用 json 的方式发送 post 请求
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function postJosn($endpoint, $params = [], $headers = [])
    {
//        $params = $this->generateParams($endpoint, $params);
        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    public function encodeDataRsa()
    {

    }

}