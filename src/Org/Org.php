<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 组织管理
 *  ======================================================.
 */

namespace Imactool\Dssplat\Org;

use Imactool\Dssplat\Core\BaseService;

class Org extends BaseService
{
    /**
     * 获取所有组织, pagination条件不为空为分页查询.
     *
     * @param array $param
     * @param array $pagination 有分页就需要传
     *
     * @return mixed
     *
     * @author cc
     */
    public function getOrganizationals(array $param = [], array $pagination = [])
    {
        $params['interfaceId'] = 'admin_002_001';
        $params['jsonParam'] = json_encode([
            'param'      => $param,
            'pagination' => $pagination,
        ], JSON_FORCE_OBJECT);

        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询单个组织详情
     * 根据组织id获取组织的详细信息.
     *
     * @param $id
     *
     * @author cc
     */
    public function getDeviceOrganization($id)
    {
        $params['interfaceId'] = 'admin_002_003';
        $params['jsonParam'] = json_encode([
            'param' => [
                'id' => $id,
            ],
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 组织新增
     * 新增设备组织.
     *
     * @param array $params
     *
     * @author cc
     */
    public function addDeviceOrganization(array $param)
    {
        $params['interfaceId'] = 'admin_002_002';
        $params['jsonParam'] = json_encode([
            'param' => $param,
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 组织修改
     * 修改设备组织信息,主要是组织名称.
     *
     * @param array $params
     *
     * @author cc
     */
    public function updateDeviceOrganization(array $param)
    {
        $params['interfaceId'] = 'admin_002_005';
        $params['jsonParam'] = json_encode([
            'param'=> $param,
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 组织删除
     * 删除设备组织信息.
     *
     * @param $ids
     *
     * @author cc
     */
    public function deleteDeviceOrganization(string $ids)
    {
        $params['interfaceId'] = 'admin_002_004';
        $params['jsonParam'] = json_encode([
            'param'=> [
                'ids'=> $ids,
            ],
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
     |--------------------------------------------------------------------------
     | 可视对讲组织管理
     |--------------------------------------------------------------------------
     |
     | 接口描述:
     | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
     | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
     | 这一块主要是用来挂载可视对讲设备的
     |
     */

    /**
     * 查询组织树
     * 一级一级获取相应的节点.
     *
     * @param array $params 接受 [ 'searchKey' =>模糊搜索关键字 , 'nodeId'=> 组织编码]
     *
     * @author cc
     */
    public function getVimsTree(array $params = [])
    {
        $params['type'] = '01;00';
        $url = '/vims/tree?'.$this->queryString();

        return $this->get($url, $this->queryArr($params), $this->headerJson());
    }

    /**
     * 查询是否支持期
     *
     * @return mixed
     *
     * @author cc
     */
    public function getVimsConfigType()
    {
        $url = '/vims/config/bytype/8?'.$this->queryString();

        return $this->get($url, $this->queryArr(), $this->headerJson());
    }

    /*
    |--------------------------------------------------------------------------
    | 设备管理
    |--------------------------------------------------------------------------
    |
    | 接口描述:
    | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
    | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
    |
    */

    /**
     * 查询设备.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDeviceInfo(array $param = [])
    {
        $params['interfaceId'] = 'admin_001_001';
        $params['jsonParam'] = json_encode([
            'param'=> $param,
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询通道.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDeviceChannel(array $param = [], array $pagination = [])
    {
        $params['interfaceId'] = 'admin_001_006';
        $params['jsonParam'] = json_encode([
            'param'     => $param,
            'pagination'=> $pagination,
        ], JSON_FORCE_OBJECT);
        $url = '/admin/rest/api?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询组织设备树
     * 树型接口,可以根据type值查询到所需要的设备/通道结果,针对设备这一块,该接口推荐使用.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getGroupDeviceTree(array $param)
    {
        $url = '/admin/ztree.action?'.$this->queryString();

        return $this->get($url, $this->queryArr($param), $this->headerJson());
    }

    /**
     * 查询门禁设备信息.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorDeviceInfo(array $params)
    {
        $url = '/CardSolution/card/accessControl/device/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询门禁通道信息.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorDeviceChannelInfo(array $params)
    {
        $url = '/CardSolution/card/accessControl/channel/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询门禁设备树
     * 门禁设备树请求,一层一层逐级请求
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorDeviceTree(array $params)
    {
        $url = '/CardSolution/resource/tree/nodeList?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
      |--------------------------------------------------------------------------
      | 可视对讲设备
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      |
      | 可视对讲设备单独接口,可视对讲设备包含(管理机,围墙机,门口机,室内机,等单元联网控制器),可视对讲设备也包含门禁类的功能
      |
      */
    /**
     * 查询可视对讲设备.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getFaceDevice(array $param)
    {
        $url = '/vims/device/list?'.$this->queryString();

        return $this->get($url, $this->queryArr($param), $this->headerJson());
    }

    /**
     * 查询可视对讲设备列表.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getFaceDeviceList(array $param = [])
    {
        $url = '/vims/device/list/condition?'.$this->queryString();

        return $this->get($url, $this->queryArr($param), $this->headerJson());
    }

    /**
     * 查询设备树
     * 一级一级获取相应的节点.
     *
     * @param array $param
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDeviceTree(array $param = [])
    {
        $url = '/vims/tree?'.$this->queryString();

        return $this->get($url, $this->queryArr($param), $this->headerJson());
    }

    /*
   |--------------------------------------------------------------------------
   | 部门管理
   |--------------------------------------------------------------------------
   |
   | 接口描述:
   | 用于对人员的管理分类
   | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
   | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
   |
   */

     /*
       |--------------------------------------------------------------------------
       | 人员属性标签
       |--------------------------------------------------------------------------
       |
       | 接口描述:
       | 用于对人员的管理分类
       | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
       | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
       |
       */

    /*
       |--------------------------------------------------------------------------
       | 人员管理
       |--------------------------------------------------------------------------
       |
       | 接口描述:
       |
       | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
       | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
       |
       */

    /*
       |--------------------------------------------------------------------------
       | 卡片管理
       |--------------------------------------------------------------------------
       |
       | 接口描述:
       |
       | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
       | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
       |
       */

    /*
      |--------------------------------------------------------------------------
      | 用户管理
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      |
      | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
      | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
      |
      */
}
