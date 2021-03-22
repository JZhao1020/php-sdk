# php常用功能封装

## 开源地址
https://github.com/JZhao1020/sdk

##安装
```
composer require hao/sdk
```


##抽奖代码示例
```
$arr = [
   ['id' => 1,'prize' => '一等奖', 'v' => 1],
   ['id' => 2,'prize' => '二等奖', 'v' => 1],
   ['id' => 3,'prize' => '三等奖', 'v' => 100],
   ['id' => 4,'prize' => '谢谢参与', 'v' => 1000],
];
$class = \PHPSDK\Loader::get('Prize');
$result = $class->init($arr);
dump($result);
```

##随机红包代码示例
```
$class = \PHPSDK\Loader::get('Hongbao');
$result = $class->red_rand(100,20);//100：总金额；20红包个数
dump($result);
```
