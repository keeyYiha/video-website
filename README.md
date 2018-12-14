
后台管理参考：
-------------
```
https://github.com/mdmsoft/yii2-admin
```

CSS 参考：
-------------
```
http://demo.cssmoban.com/cssthemes5/cpts_992_bmf.0-alpha/
https://github.com/almasaeed2010/AdminLTE/tree/v3.0.0-alpha
https://adminlte.io/
```

初始化第三方库：
-------------
```
composer install 

or (Your requirements could not be resolved to an installable set of packages.)

composer install --ignore-platform-reqs
```

nginx配置：
-------------

### frontend.conf

```
server{
    listen 8080;
    index  index.html index.htm index.php;
    autoindex off;
    root yourRoot;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ ^/v1/.+\.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        include        fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME /root/index.php;

        fastcgi_param  DOCUMENT_URI    /index.php;
        fastcgi_param  SCRIPT_NAME     /index.php;
        #include fastcgi.conf;
    }
    location ~ .*\.(php|php5)?$
    {
      fastcgi_pass  127.0.0.1:9000;
      fastcgi_index index.php;
      include fastcgi.conf;
    }

}
```

### backend.conf

```
server{
    listen 8081;
    index  index.html index.htm index.php;
    autoindex off;
    root yourRoot;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ ^/v1/.+\.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        include        fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME /root/index.php;

        fastcgi_param  DOCUMENT_URI    /index.php;
        fastcgi_param  SCRIPT_NAME     /index.php;
        #include fastcgi.conf;
    }
    location ~ .*\.(php|php5)?$
    {
      fastcgi_pass  127.0.0.1:9000;
      fastcgi_index index.php;
      include fastcgi.conf;
    }

}
```
