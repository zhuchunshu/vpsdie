## VPSDIE

垃圾主机商收集程序

## 截图

1.

![./assets/截屏2021-07-03 下午12.14.48](https://raw.githubusercontent.com/zhuchunshu/vpsdie/master/assets/%E6%88%AA%E5%B1%8F2021-07-03%20%E4%B8%8B%E5%8D%8812.13.41.png)

2.

![./assets/截屏2021-07-03 下午12.14.48.png](https://raw.githubusercontent.com/zhuchunshu/vpsdie/master/assets/%E6%88%AA%E5%B1%8F2021-07-03%20%E4%B8%8B%E5%8D%8812.14.24.png)

3.

![./assets/截屏2021-07-03 下午12.14.48.png](https://raw.githubusercontent.com/zhuchunshu/vpsdie/master/assets/%E6%88%AA%E5%B1%8F2021-07-03%20%E4%B8%8B%E5%8D%8812.14.41.png)

4.

![./assets/截屏2021-07-03 下午12.14.48.png](https://raw.githubusercontent.com/zhuchunshu/vpsdie/master/assets/%E6%88%AA%E5%B1%8F2021-07-03%20%E4%B8%8B%E5%8D%8812.14.48.png)

## 安装

### 要求

- PHP >= 7.3

- Swoole PHP 扩展 >= 4.5，并关闭了 `Short Name`

  [https://hyperf.wiki/2.1/#/zh-cn/quick-start/questions?id=swoole-%e7%9f%ad%e5%90%8d%e6%9c%aa%e5%85%b3%e9%97%ad](https://hyperf.wiki/2.1/#/zh-cn/quick-start/questions?id=swoole-短名未关闭)

- OpenSSL PHP 扩展

- JSON PHP 扩展

- PDO PHP 扩展 （如需要使用到 MySQL 客户端）

- Redis PHP 扩展 （如需要使用到 Redis 客户端）

### 开始

在合适的位置创建一个目录,cd进去并执行:

```bash
git clone https://github.com/zhuchunshu/vpsdie.git .
```

如果是国内机器则执行

```bash
git clone https://gitee.com/zhuchunshu/vpsdie.git
```

克隆完项目之后执行:

```bash
composer install
```

运行完毕执行:

```bash
cp .env.example .env
```

然后编辑.env文件,配置好数据库信息以及`APP_NAME`

接下来迁移数据库:

```bash
php ./bin/hyperf.php migrate --force
```

然后创建管理员账号

```bash
php ./bin/hyperf.php CodeFec:Init
```

最后运行

```bash
php ./bin/hyperf.php server:watch
```

如果不报错就是运行成功了,中断后把此命令守护起来就可以啦

最后反向代理下 127.0.0.1:9501就好了

然后访问你的域名/admin即可进入管理后台

