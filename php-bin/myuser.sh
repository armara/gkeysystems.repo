#!/bin/bash

user=admin
group=admin

cd /var/www/$user/php-bin

#sudo -u $user /usr/bin/php-cgi
/usr/local/fastpanel/suexec.lighttpd $user $group php.sh

