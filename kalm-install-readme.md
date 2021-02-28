- config volumes

```
MountPath: /srv/app/application/database.php
MountPath: /srv/app/application/route.php
MountPath: /srv/app/portal.php
MountPath: /srv/app/tfm/config.php
```

- commands:
  tar -xvzf /srv/app/application/install/origins/data.tar.gz -C /srv/app/
  tar -xvzf /srv/app/application/install/origins/extra.tar.gz -C /srv/app/
  tar -xvzf /srv/app/application/install/origins/runtime.tar.gz -C /srv/app/
  tar -xvzf /srv/app/application/install/origins/static.tar.gz -C /srv/app/
  tar -xvzf /srv/app/application/install/origins/template.tar.gz -C /srv/app/
  tar -xvzf /srv/app/application/install/origins/upload.tar.gz -C /srv/app/

```
chown -R www-data:www-data /srv/app/application/database.php;
chown -R www-data:www-data /srv/app/application/route.php;
chown -R www-data:www-data /srv/app/portal.php;
chown -R www-data:www-data /srv/app/application/extra;
chown -R www-data:www-data /srv/app/application/data;
chown -R www-data:www-data /srv/app/runtime;
chown -R www-data:www-data /srv/app/upload;
chown -R www-data:www-data /srv/app/static;
chown -R www-data:www-data /srv/app/template;
apache2-foreground;
```

networking
80:80

db:
image:mariadb
MYSQL_DATABASE
MYSQL_USER
MYSQL_ROOT_PASSWORD
MYSQL_PASSWORD
port
3306

tar -xvzf /srv/app/application/install/origins/data.tar.gz -C /srv/app/
