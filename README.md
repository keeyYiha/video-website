

初始化第三方库：
=============
```
composer install 
如提示：
Your requirements could not be resolved to an installable set of packages.
则用：
composer install --ignore-platform-reqs
```

nginx配置：
=============

video-website-frontend.conf

```
server{
    listen 8080;
    index  index.html index.htm index.php;
    autoindex off;
    root root;

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

video-website-backend.conf

```
server{
    listen 8080;
    index  index.html index.htm index.php;
    autoindex off;
    root root;

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
