# DryDockOfArk

A sample project based on Ark.

PHP 7 is required. Licensed with MIT.

## To build a project with Ark

Yes, you just need to use the Dry Dock of Ark.

First, you need to get the complete code of DryDockOfArk, use 

    composer create-project sinri/dry-dock-of-ark YourProjectName
    
and do not forget to run `composer install` inside.
    
Then create the `config.php` in the directory of `config`, a sample given there named `config.sample.php`.

Configure your own config file, check your requirements on Database, Cache and Log, and make modification.

It is recommended to load all those components when project is loading, so you can do this job in `autoload.php`. 

If you use Apache to load the project, you need to add the `.htaccess` file and open the allow override option.

```apacheconfig
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

For Nginx, you should use `try_files`.

```
server {
    location / {
        try_files $uri $uri/ /index.php?$args;
    }
}
```

Those command would let all requests be led to the target file first, and if not exists let `index.php` handle them.

If you need to embed frontend inside, though not a good choice for huge site, directory `frontend` is provided there by default, 
and `index.html` is there as sample.

