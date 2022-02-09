<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 可视对讲类
 * 该大类对应的设备类型有:( 管理机、围墙机、围墙机(红外)、围墙机(白光)、数字门口机(白光)、数字门口机(红外)、数字门口机、半数字门口机、
 * 数字室内机、模拟室内机、室内机（支持门锁）、单元联网控制器、虚拟室内机等)
 * 可视对讲类设备有一部分门禁的能力,部分设备同时具有人脸的能力
 * 对讲类设备获取详见 01-基础数据接口文档
 *  ======================================================
 */
namespace Imactool\Dssplat\ACF;

use Imactool\Dssplat\Core\BaseService;

class VideoIntercom extends BaseService
{
    /*
     |--------------------------------------------------------------------------
     | 可视对讲分组
     |--------------------------------------------------------------------------
     |
     | 接口描述:
     | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
     | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
     |
     */
    /**
     * 查询分组
     * @param string $groupName
     * @return mixed
     * @author cc
     */
    public function getVimsCardGroup(string $groupName)
    {
        $url = '/vims/cardGroup/list?'.$this->queryString();
        $parmas = [
            'groupNameLikeStr' => $groupName
        ];
        return $this->get($url,$this->queryArr($parmas),$this->headerJson());
    }

    /**
     * 添加分组
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function addCardGroup(array $params)
    {
        $url = '/vims/cardGroup/add?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 修改分组
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function updateCardGroup(array $params)
    {
        $url = '/vims/cardGroup/update?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 删除分组
     * @param  $id
     * @return mixed
     * @author cc
     */
    public function deleteVimsCardGroup($id)
    {
        $url = '/vims/cardGroup/delete/'.$id.'?'.$this->queryString();
        $parmas = [
            'id' => $id
        ];
        return $this->get($url,$this->queryArr($parmas),$this->headerJson());
    }

    /**
     * 查询分组中的设备
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getVimsCardDeviceGroup(array $params)
    {
        $url = '/vims/cardGroup/relChnsPage?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /*
     |--------------------------------------------------------------------------
     | 卡片授权
     |--------------------------------------------------------------------------
     |
     | 接口描述:
     | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
     | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
     |
     */

    /**
     * 添加卡片授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function addCardAuth(array $params)
    {
        $url = '/vims/card/auth/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 修改卡片授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function updateCardAuth(array $params)
    {
        $url = '/vims/card/auth/update/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 删除卡片授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function deleteCardAuth(array $params)
    {
        $url = '/vims/card/auth/cancel?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 查询卡片授权任务
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardAuthTaskList(array $params)
    {
        $url = '/vims/card/task/list?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查看访客卡片任务
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardAuthTaskVisitor(array $params)
    {
        $url = '/vims/card/task/visitor/list?draw=1&'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查询授权卡片列表
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardAuthList(array $params)
    {
        $url = '/vims/card/list?isAccredit=1&'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /*
     |--------------------------------------------------------------------------
     | 人脸授权
     |--------------------------------------------------------------------------
     |
     | 接口描述:
     | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
     | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
     |
     */

    /**
     * 添加人脸授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function addFaceAuth(array $params)
    {
        $url = '/vims/face/auth/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 修改人脸授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function updateFaceAuth(array $params)
    {
        $url = '/vims/face/auth/update/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 删除人脸授权
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function deleteFaceAuth(array $params)
    {
        $url = '/vims/face/auth/cancel/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /**
     * 查看人脸授权任务
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getFaceAuthTask(array $params)
    {
        $url = '/vims/faceTask/list'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查看访客人脸授权任务
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getFaceAuthVistorTask(array $params)
    {
        $url = '/vims/faceTask/visitor/list?draw=5&'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查询授权人脸列表
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getFaceAuthTaskList(array $params)
    {
        $url = '/vims/face/page/accredit?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /*
        |--------------------------------------------------------------------------
        | 对讲控制
        |--------------------------------------------------------------------------
        |
        | 接口描述:
        | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
        | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
        |
        */

    /**
     * 开门
     * @param $channel
     * @return mixed
     * @author cc
     */
    public function openDoor($channel)
    {
        $url = '/vims/log/talk/opendoor?'.$this->queryString();
        $params['channel'] = $channel;
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    public function generateQRCode(array $params)
    {
        $url = '/vims/card/generateQRCode/api?'.$this->queryString();
        return $this->postJosn($url,$params);
    }

    /*
   |--------------------------------------------------------------------------
   | 对讲控制
   |--------------------------------------------------------------------------
   |
   | 接口描述:
   | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
   | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
   |
   */

    /**
     * 可视对讲设备报警记录
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getAlarmRecord(array $params)
    {
        $url = '/vims/log/talk/opendoor?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 可视对讲设备开门记录
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getOpenDoorRecord(array $params)
    {
        $url = '/vims/log/opendoor/list?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 可视对讲设备通话记录
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getFaceTalkRecord(array $params)
    {
        $url = '/vims/log/talk/list?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /*
    |--------------------------------------------------------------------------
    | 人卡信息
    |--------------------------------------------------------------------------
    |
    | 接口描述:
    | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
    | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
    |
    */

    /**
     * 查询人员卡片列表(分页,包含是否授权)
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardMemberPageList(array $params)
    {
        $url = '/vims/card/page/accredit?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查询人员卡片列表(列表,包含是否授权)
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardMemberList(array $params)
    {
        $url = '/vims/card/list/accredit?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查询人员信息列表
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getMemberList(array $params)
    {
        $url = '/vims/app/user/page/owner?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /**
     * 查询卡片列表
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getCardList(array $params)
    {
        $url = '/vims/card/list?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }

    /*
      |--------------------------------------------------------------------------
      | 人卡信息
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
      | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
      |
      */

    /**
     * 新增app用户
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function addAppUser(array $params)
    {
        $url = '/vims/app/user/save?'.$this->queryString();
        return $this->post($url,$params);
    }

    /**
     * 修改app用户联系方式
     * 表单提交方式,只能修改联系方式
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function updateAppUser(array $params)
    {
        $url = '/vims/app/user/update?'.$this->queryString();
        return $this->post($url,$params);
    }

    /**
     * app用户查询
     * @param array $params
     * @return mixed
     * @author cc
     */
    public function getAppUser(array $params)
    {
        $url = '/vims/app/user/list?'.$this->queryString();
        return $this->get($url,$this->queryArr($params),$this->headerJson());
    }
}