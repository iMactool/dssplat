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

use Imactool\Dssplat\Core\BaseService;

class AccessControl extends BaseService
{
    /*
    |--------------------------------------------------------------------------
    | 开门计划
    |--------------------------------------------------------------------------
    |
    | 接口描述:
    | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
    | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
    | 开门计划的配置建议直接在平台上手动配置
    |
    */

    /**
     * 开门计划查询.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getOpeningPlan(array $params)
    {
        $url = '/CardSolution/card/accessControl/timeQuantum/1/page?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 新增开门计划.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function addOpeningPlan(array $params)
    {
        $url = '/CardSolution/card/accessControl/timeQuantum?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 修改开门计划.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function updateOpeningPlan(array $params)
    {
        $url = '/CardSolution/card/accessControl/timeQuantum/update?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 删除开门计划.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function deleteOpeningPlan(array $params)
    {
        $url = '/CardSolution/card/accessControl/timeQuantum/delete?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
    |--------------------------------------------------------------------------
    | 门组
    |--------------------------------------------------------------------------
    |
    | 接口描述:
    | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
    | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
    | 门组用于将具有相同功能的设备集中起来,方便在授权时可以直接按门组授权,避免一个一个门禁去授权
    |
    */

    /**
     * 添加门组.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function addDoorGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorGroup?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 修改门组.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function updateDoorGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorGroup/update?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 删除门组.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function deleteDoorGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorGroup/delete/batch?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查看门组权限.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorGroupPermissions($id)
    {
        $url = '/CardSolution/card/accessControl/doorGroup/'.$id.'?'.$this->queryString();

        return $this->postJosn($url, []);
    }

    /**
     * 门组查询.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorGroup/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
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
     * 添加/批量添加卡片授权.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function addDoorAuthority(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 修改卡片授权.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function updateDoorAuthority(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/update?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 删除卡片授权.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function deleteDoorAuthority(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/delete/batch?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询卡片授权.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function searchDoorAuthority(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 根据卡号查询授权详情.
     *
     * @param string $cardNumber
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityByCardNumber($cardNumber)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/'.$cardNumber.'?'.$this->queryString();

        return $this->postJosn($url, []);
    }

    /**
     * 根据部门进行卡片授权(按门组).
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityByGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/authorizeAllDeptByDoorGroups?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 删除按部门授权(根据门组).
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function deleteDoorAuthorityByGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/removeAuthorizeAllByDoorGroups?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 根据部门进行卡片授权(按门禁通道).
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityByGroupChannelCode(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/authorizeAllDeptByChannelCode?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 删除按部门授权(根据门禁通道).
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function deleteDoorAuthorityByGroupChannelCode(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/removeAuthorizeAllByChannelCode?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询门禁点已授权的部门列表.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityListByGroup(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/authorizedDepartment/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询门组已授权的部门列表.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityGroupList(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/authorizedDoorGroupDepartment/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 卡片授权任务查询.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getDoorAuthorityCardSyncList(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/getAcsCardSyncList?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
      |--------------------------------------------------------------------------
      | 人脸授权
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
      | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
      | 人脸授权可以单独调用接口进行授权,也可以自动进行授权,即在人员有照片且人员所绑的卡已经授过权的情况下,
      | 默认会自动将人脸照片下发至已经授权的门禁下,在人员照片有更新时也会自动授权
      |
      */
    /**
     * 人脸授权.
     *
     * @param array $params
     *                      该接口为单独的人脸授权接口,针对人脸授权可以调用该接口,也可以通过卡片授权来自动进行人脸授权。
     *                      person中code为人员的唯一识别编号,如果人员不存在则会新增，如果存在则只更新人员图片,并授权人脸权限到resouceCodes中的通道,之前已经授权的通道权限不删除
     *
     * @return mixed
     *
     * @author cc
     */
    public function addPrivilegeFace(array $params)
    {
        $url = '/CardSolution/card/person/privilegeFace?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 修改人脸授权时间.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function updatePersonCode(array $params)
    {
        $url = '/CardSolution/card/card/time/personCode?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 查询人脸授权任务
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getAcsFaceSyncList(array $params)
    {
        $url = '/CardSolution/card/accessControl/doorAuthority/getAcsFaceSyncList?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
      |--------------------------------------------------------------------------
      | 门禁控制
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
      | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
      |
      */
    /**
     * 开门.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function openDoor(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/openDoor?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 关门.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function closeDoor(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/closeDoor?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 常开
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function stayOpen(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/stayOpen?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 常闭.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function stayClose(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/stayClose?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 门禁控制正常
     * 把门通道模式设置为正常.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function controlNormal(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/normal?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 二维码下发
     * 二维码下发需要在8900平台 访客管理-系统配置 访客二维码加密 勾上.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function qrCode(array $params)
    {
        $url = '/CardSolution/card/card/qrCode?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 状态查询.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getChannelStatus(array $params)
    {
        $url = '/CardSolution/card/accessControl/channelControl/channels?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /*
      |--------------------------------------------------------------------------
      | 记录查询
      |--------------------------------------------------------------------------
      |
      | 接口描述:
      | 接口请求url后拼接的userId和userName及token为1.1.2 鉴权参数获取 接口返回的id,loginName及token
      | 门禁数据访问端口默认8314,外网情况下需开通相应端口映射
      |
      */
    /**
     * 刷卡记录查询
     * 以pageNum和pageSize递归查询,一直到查不到数据位为止.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getCardRecord(array $params)
    {
        $url = '/CardSolution/card/accessControl/swingCardRecord/bycondition/combined?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 刷卡记录条数统计
     * 条件统计刷卡记录数量.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getCardRecordTotal(array $params)
    {
        $url = '/CardSolution/card/accessControl/swingCardRecord/bycondition/combinedCount?'.$this->queryString();

        return $this->postJosn($url, $params);
    }

    /**
     * 认证记录查询
     * 访客机认证比对记录查询,该查询比较特殊,为表单提交,content-type: application/x-www-form-urlencoded; charset=UTF-8.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @author cc
     */
    public function getCertificationRecord(array $params)
    {
        $url = '/CardSolution/integrate/bycondition/combined?'.$this->queryString();

        return $this->post($url, $params);
    }

    /**
     * 获取认证记录抓拍图片.
     *
     * @param string $id 认证记录id
     *
     * @return mixed
     *
     * @author cc
     */
    public function getFacePhoto($id)
    {
        $url = '/CardSolution/integrate/getFacePhotoUrl/'.$id.'?'.$this->queryString();
        $params['id'] = $id;

        return $this->get($url, $this->queryArr($params), $this->headerJson());
    }

    /**
     * 获取认证记录身份证照片.
     *
     * @param string $id 认证记录id
     *
     * @return mixed
     *
     * @author cc
     */
    public function getPaperNumberPhoto($id)
    {
        $url = '/CardSolution/integrate/getPaperNumberPhotoUrl/'.$id.'?'.$this->queryString();
        $params['id'] = $id;

        return $this->get($url, $this->queryArr($params), $this->headerJson());
    }
}
