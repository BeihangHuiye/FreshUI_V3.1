## 包含的内容

一个**admin** 文件夹

菜单文件Menu.php

![包含的文件](https://github.com/BeihangHuiye/FreshUI_V3.1/assets/148823447/88fa6cd3-47c7-446a-bff5-a2fcdf45b3b1)


## 效果预览

可以登陆我的博客后台看看哦！

![后台样式](https://github.com/BeihangHuiye/FreshUI_V3.1/assets/148823447/b97af179-4eb3-4a59-b74b-50a0ec8badcb)


## 测试环境

PHP版本：PHP7.4，PHP8.0~PHP8.2

Typecho版本：Typecho1.2.1

主题版本：Hnadsome主题9.0.2

## 使用方法

<font color='red'>0、万事先备份，防止火葬场，**建议直接整站压缩备份**</font>>

1、直接 **删除** 网站根目录 **admin** 文件夹，**新建admin文件夹**，将压缩包内所有文件解压到admin文件夹内

2、移动  **Menu.php** 到网站根目录 **var/Widget** 文件夹内，清理浏览器缓存

3、修改评论区头像显示问题：

在博客的“var/Typecho/Common.php”的第836行左右，将https://secure.gravatar.com修改为国内源https://cravatar.cn即可。如下图所示。

![修改头像的源](https://github.com/BeihangHuiye/FreshUI_V3.1/assets/148823447/580a15dd-123f-49f8-a6c4-516699712ed5)

4、修改网站后台的左上角logo

在`admin/FreshUi.php`中，将

```php

<a class="navbar-brand brand-logo" href="index.php"><img src="你的头像url" alt="logo"></a>

···

中的src修改为你的头像的地址即可！

![头像的地址](https://github.com/BeihangHuiye/FreshUI_V3.1/assets/148823447/9615a39e-03df-4392-a35b-f806714dfe2a)


## 版权声明

请尊重原作者的创作！原作品地址：[Fresh -- Github地址](https://github.com/Daboias/Fresh)

但是这个作品已经年久失效，一方面是Typecho已经升级到1.2.1，这包括重要的安全更新，我强烈建议所有的用户升级到最新版本。另一方面是PHP版本的更新，现在越来越多的用户开始使用PHP8了，PHP8的速度确实快很多。于是我在原本的基础上进行了各种调试，最终自己也在用这个后台模板。

虽然不是自己的原创作品，但是作为一名不懂PHP语言、学习机械工程专业的学生来说，真的是付出了很多很多的努力！

