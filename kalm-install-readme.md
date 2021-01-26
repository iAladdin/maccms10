- config volumes

```
MountPath: /srv/app/application/database.php
MountPath: /srv/app/application/route.php
MountPath: /srv/app/portal.php
MountPath: /srv/app/tfm/config.php
```

- commands:

```
chown -R www-data:www-data /srv/app/application/database.php;
chown -R www-data:www-data /srv/app/application/route.php;
chown -R www-data:www-data /srv/app/application/portal.php;
chown -R www-data:www-data /srv/app/application/extra;
chown -R www-data:www-data /srv/app/application/data;
chown -R www-data:www-data /srv/app/runtime;
chown -R www-data:www-data /srv/app/upload;
chown -R www-data:www-data /srv/app/static;
chown -R www-data:www-data /srv/app/template;
apache2-foreground;
```
