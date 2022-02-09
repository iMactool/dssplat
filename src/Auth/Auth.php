<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */

namespace Imactool\Dssplat\Auth;


use Imactool\Dssplat\Core\BaseService;
use Imactool\Dssplat\Traits\CacheAdapter;

class Auth extends BaseService
{

    use CacheAdapter;

    protected $token;
    //DSS-H8900-SDK-20200111版本(v3.1.4)
    protected $H8900TokenCacheKey = 'dss.h8900.sdk.20200111.v3.1.4.token';


    /**
     * 1.1.1获取公钥
     * 用于获取令牌token步骤中密码的加密,加密方式为RSA加密,该接口默认端口为 8314
     * @return mixed
     * @author cc
     */
    public function getPublicKey()
    {

        $params['loginName'] = self::$config['loginName'];
        return $this->postJosn('/WPMS/getPublicKey',$params);
    }


    public function getPublicKeyRefresh()
    {
        $result = $this->getPublicKey();
    }

    /**
     * 1.1.2 鉴权参数获取(token,userId,userName)
     * 用于获取接口鉴权的token,userId,userName
     * 接口每次调用时,publicKey需要实时获取
     * 该接口默认端口为8314
     * @return mixed
     * @author cc
     */
    public function login()
    {
        $token = CacheAdapter::getInstance()->getItem($this->H8900TokenCacheKey);
        if (!$token->isHit()){
            $params = [
                'loginName' => self::$config['loginName'],
                'loginPass' => $this->getPublicKeyRsaEncrypt(self::$config['loginPass'])
            ];
            $result =  $this->postJosn('/WPMS/login',$params);
            //获取到的授权信息直接管理起来
            if ($result['success'] == true){
                $config['token'] = $result['token'];
                $config['userId'] = $result['userId'] = $result['id']; //用户ID
                $config['publicKey'] = $result['publicKey']; //用户ID
                $this->setConfig($config);
                $token->set($result);
                $token->expiresAfter(1200);
                CacheAdapter::getInstance()->save($token);
            }
            return $result;
        }

        $config['token'] = $token->get()['token'];
        $config['userId'] = $token->get()['id']; //用户ID
        $config['publicKey'] = $token->get()['publicKey']; //用户ID
        $this->setConfig($config);
        return $token->get();
    }

    /**
     * @param string $publickey
     * @return string
     * @author cc
     */
    private function getRsaKeyStr() : string
    {
        $result = $this->getPublicKey();
        if ($result['success'] == true){
            return "-----BEGIN PUBLIC KEY-----\n".wordwrap($result['publicKey'],64,"\n",true)."\n-----END PUBLIC KEY-----";
        }
        return '';
    }

    public function getPublicKeyRsaEncrypt(string $data)
    {
        return openssl_public_encrypt($data,$encrypted_data, $this->getRsaKeyStr()) ? base64_encode($encrypted_data) : null;
    }
}