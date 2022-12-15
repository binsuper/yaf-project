# Yaf Project

## 简介

基于yaf的项目框架



## 需求

* php version >= 7.2

* [ext-yaf](https://github.com/laruence/yaf) >= 3.3.5

  

## 安装

1. 安装项目

   ```bash
   composer create-project binsuper/yaf-project
   ```

   

2. 安装依赖

   ```
   项目根目录执行 composer install 安装所有依赖
   ```

   

3. 环境参数配置

   有两种配置环境参数的方式

   ①环境变量 ( .env )

   ```
   ~ 重命名根目录下的 .env.example 文件为 .env
   ~ 打开.env文件并编辑相关配置内容
   ~ 在代码中使用 env("name") 获取配置信息
   ```

   ②动态配置

   框架支持根据项目域名加载配置文件，同时也支持定向加载，只需要增加 config/.domain 文件，文件内容为定向加载的目录名称

   ```
   例如项目域名为 proj.yaf.com，当使用 config('app') 获取配置，文件加载流程如下：
   
   1. 寻找 config/.domain 文件，如果有（假设文件的内容为 product）则跳转到第2步，没有则跳转到第3步；
   2. 寻找 config/product/app.php 配置文件，有则加载，没有则执行第4步；
   3. 寻找 config/proj.yaf.com/app.php 配置文件，有则加载，没有则执行下一步；
   4. 寻找 config/app.php 配置文件，有则加载，没有将返回空值；
   ```

   

   

### 使用教程

暂无