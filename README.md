# Docker with Stateless Wordprss and SQL for AWS 

- [Docker with Stateless Wordprss and SQL for AWS](#docker-with-stateless-wordprss-and-sql-for-aws)
  - [Before starting...](#before-starting)
  - [Under the hood](#under-the-hood)
  - [Note: FTP Connection Information](#note-ftp-connection-information)
  - [Note: Understanding the Workflow](#note-understanding-the-workflow)
    - [deploy.sh](#deploysh)

## Before starting...

> For some reasons, this only works if you place your project under **C:/** drive. If you place your project in any other drives, it would appear the following message. Note: I'm using Windows 10 Pro OS. 
![](https://i.gyazo.com/e0dfd5c1f19874f0a60623c18274248f.png)

## Under the hood

`./wordpress/Dockerfile` adds the `wp-content` folder, `.htaccess` and `wp-config.php` into the container. The `wp-config` uses Wordpress image **environment variables** from `.env` file. In production, you will need to set the .env variables in the cloud. For example, in AWS [ECR][ecr], you will need to set it in the **Container Definition** under **Task Definitions**. I have written a very short tutorial on [How to deploy a simple docker application to AWS (2019)][1]

![](https://gyazo.com/7532476a978aa40be7adab046f72a4b6.png)

## Note: FTP Connection Information

Wordpress cannot write to `wp-content` Because we have mounted it to our host. That's why Wordpress prompt you for your FTP connection information.

To Install Wordpress plugins directly without FTP, you need to add `define('FS_METHOD', 'direct');` to your `wp-config.php`. 

> To understand what security concerns you should have, please read here
> https://wordpress.stackexchange.com/questions/189554/what-security-concerns-should-i-have-when-setting-fs-method-to-direct-in-wp-co


## Note: Understanding the Workflow

### deploy.sh

`deploy.sh` does several things in the script before pushing your container to the cloud. 

For wordpress, this it how it works:

- It first commits your local docker `image:version` to your remote container registry (Amazon Elastic Container Registry).
- ```
    docker commit $WP_CONTAINER $IMAGE:$VERSION

    ... same as

    docker commit 123456789123.dkr.ecr.eu-west-2.amazonaws.com/wordpress/yourwebsite:0.0.1
  ```

- Then, it creates a different tag for your remote repo.  
- ```
    docker tag $IMAGE:$VERSION $WP_REPO:$VERSION

    ... same as

    docker tag wordpress/yourwebsite:0.0.1 123456789123.dkr.ecr.eu-west-2.amazonaws.com:0.0.1
  ```
- Finally, it pushes to the repo.
- ```
    docker push $WP_REPO:$VERSION

    ... same as

    docker push 123456789123.dkr.ecr.eu-west-2.amazonaws.com:0.0.1
  ```

[1]:http://ansoncheung.me/web-development/devops/2019/07/05/how-to-deploy-a-simple-docker-application-on-aws.html

[ecr]:https://aws.amazon.com/ecr/