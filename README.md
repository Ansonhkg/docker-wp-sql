# Docker with Stateless Wordprss and SQL for AWS 

- [Docker with Stateless Wordprss and SQL for AWS](#Docker-with-Stateless-Wordprss-and-SQL-for-AWS)
  - [Before starting...](#Before-starting)
  - [Under the hood](#Under-the-hood)
  - [Note: FTP Connection Information](#Note-FTP-Connection-Information)

## Before starting...

> For some reasons, this only works if you place your project under **C:/** drive. If you place your project in any other drives, it would appear the following message. Note: I'm using Windows 10 Pro OS. 
![](https://i.gyazo.com/e0dfd5c1f19874f0a60623c18274248f.png)

## Under the hood

`./wordpress/Dockerfile` adds the `wp-content` folder, `.htaccess` and `wp-config.php` into the container. The `wp-config` uses Wordpress image **environment variables** from `.env` file. In production, you will need to set the .env variables in the cloud. For example, in AWS [ECR](https://aws.amazon.com/ecr/), you will need to set it in the **Container Definition** under **Task Definitions**. I have written a very short tutorial on [How to deploy a simple docker application to AWS (2019)](1)

![](https://gyazo.com/7532476a978aa40be7adab046f72a4b6.png)

## Note: FTP Connection Information

Wordpress cannot write to `wp-content` Because we have mounted it to our host. That's why Wordpress prompt you for your FTP connection information.

To Install Wordpress plugins directly without FTP, you need to add `define('FS_METHOD', 'direct');` to your `wp-config.php`. 

> To understand what security concerns you should have, please read here
> https://wordpress.stackexchange.com/questions/189554/what-security-concerns-should-i-have-when-setting-fs-method-to-direct-in-wp-co

[1]:http://ansoncheung.me/web-development/devops/2019/07/05/how-to-deploy-a-simple-docker-application-on-aws.html