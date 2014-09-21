media
=====

Be sure tolet write access to the Workspaces/ directory 0777 rights

chmod 0777 -R /var/www/domain.com/bundles/media/Workspaces/ && sudo chown www-data:www-data -R /var/www/domain.com/bundles/media/Workspaces/

Where www-data is the default user used by an apache2 instance under a Debian environment, to know your use exec('whoami'); with a PHP script.

You also need to make a symbolic link to a PUBLIC_PATH . '/u/' folder directly to /var/www/nbonnici.info/bundles/media/Workspaces/Public if you want direct hotlink access.
