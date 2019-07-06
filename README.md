# Docker with Stateless Wordprss and SQL

- [Docker with Stateless Wordprss and SQL](#Docker-with-Stateless-Wordprss-and-SQL)
  - [Note](#Note)
  - [Note 2](#Note-2)
    - [Creating a database in advanced](#Creating-a-database-in-advanced)
  - [Note 3 (FTP Connection Information!?)](#Note-3-FTP-Connection-Information)

## Note

For some reasons, this only works if you place your project under C:/ drive. If you place your project in any other drives, it would appear:

![](https://i.gyazo.com/e0dfd5c1f19874f0a60623c18274248f.png)

## Note 2

When mouting a custom `wp-config.php`, you need to make sure you are not using any environment variable. That's because the offical Wordpress docker image will automatically configure `wp-config.php` using the environment variables you set. 

If you go to localhost it might say **Error establishing a database connection.**, and if you go to `localhost/wp-admin/install.php`. You might see the following message. If you read the message clearly, it says **We were able to connect to the database server**, so all you need to do now is to create a database called `wordpress` 

![](https://gyazo.com/fc3ea3b4dec030d87d7b15d1cd13038b.png)

Personally, I use [HeidiSQL](https://www.heidisql.com/) to connect to the container, and manually create a database called `wordpress`.

![](https://gyazo.com/439d639dc1bbf4e7446a676ec4f7d9a6.gif)

Now if you go back to [localhost](localhost) it should redirect you back to this page.
![](https://gyazo.com/f0c3a7ae2cb24ce057b08ce20c3c7ba7.png)

### Creating a database in advanced

You have to specify an entry point 
![](https://gyazo.com/3b3ed7655599a14c16620a89a6298c01.png)

## Note 3 (FTP Connection Information!?)

Wordpress cannot write to `wp-content` Because we have mounted it to our host. That's why Wordpress prompt you for your FTP connection information.

To Install Wordpress plugins directly without FTP, you need to add `define('FS_METHOD', 'direct');` to your `wp-config.php`. 

> To understand what security concerns you should have, please read here
> https://wordpress.stackexchange.com/questions/189554/what-security-concerns-should-i-have-when-setting-fs-method-to-direct-in-wp-co

