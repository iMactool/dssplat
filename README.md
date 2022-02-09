<h1 align="center"> dssplat </h1>

<p align="center"> 大华独立系统H8900平台接口.</p>

 
## Installing

```shell
$ composer require imactool/dssplat -vvv
```

## 使用前必看

H8900对外接口根据版本不同所用的接口文档也是不一样的,另外H8900的对外接口是根据设备来的,现场采用不同的设备所要对接的接口也是不一样的。
所以具体以实际项目部署为准，本`SDK`对接的版本是【`DSS-H8900-SDK-20200111版本(v3.1.4)`】


## 使用方法
> 更多内容请看具体文件，后续逐步完善中

``` 

 require __DIR__ .'/vendor/autoload.php';

 use Imactool\Dssplat\DssPlat;

 $config = [
     'ip' => '192.168.0.12',
     'port' => '8314',
     'loginName' => 'system',
     'loginPass' => '123456',
 ];

 $app = new DssPlat($config);
 
 $result = $app->Auth->login(); //必须先登录，才可以继续调用其他的接口
 
 
 //获取组织树
 $result = $app->Org->getVimsTree();
 var_dump($result);
 if ($result['success'] == true){
     echo "成功获取到组织树 <Br/>";
    foreach ($result['data'] as $val){
        echo "父级节点 【{$val['id']}】<br/>";
    }
 }

 //查询设备
 $res = $app->Org->getDeviceInfo();
 if ($res['result']['code'] == 'success'){
     echo "成功获取到 查询设备  <Br/>";
     $val = [];
     foreach ($res['data'] as $val){
        var_dump($val);
     }
 }
```

对应的实现的接口文档

```apacheconf
.
├── 01-基础数据接口文档  已实现
├── 02-门禁子系统接口文档 已实现
├── 03-考勤子系统接口文档
├── 04-巡更子系统接口文档
├── 05-梯控子系统接口文档
├── 06-消费子系统接口文档
├── 07-访客子系统接口文档
├── 08-会议子系统接口文档
├── 09-客流子系统接口文档
├── 10-报警子系统接口文档
├── 11-视频子系统接口文档
├── 12-停车子系统接口文档
├── 13-对讲子系统接口文档
├── 14-动环子系统接口文档
├── 15-人脸子系统接口文档
├── 16-工地子系统接口文档
├── 17-小区子系统接口文档
└── 99-事件订阅类接口文档
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/imactool/dssplat/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/imactool/dssplat/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT