#!/bin/bash
set -e

#
# This script is executed on the destination host after the build is finished
# The Bitbucket Pipeline executes the script over SSH using the default www-data user
#
test -e /tmp/$BUILD
test -e /var/www/.pc-assist.app && rm -rf /var/www/.pc-assist.app
test -e /var/www/pc-assist.app || mkdir /var/www/pc-assist.app
mkdir /var/www/.pc-assist.app
tar xzf /tmp/$BUILD -C /var/www/.pc-assist.app/

cd /var/www/.pc-assist.app
. .env
test -e $LOG_DIR||mkdir $LOG_DIR

# Activate the new build
mv /var/www/pc-assist.app /var/www/_pc-assist.app
mv /var/www/.pc-assist.app /var/www/pc-assist.app

# Clean up
rm -rf /var/www/_pc-assist.app
rm -f /tmp/$BUILD

cd /var/www/pc-assist.app

# Clear Compiled/Routes/Cache/Config/Event/View
php artisan cache:clear
