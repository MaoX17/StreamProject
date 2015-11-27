#!/bin/bash
export PATH=/opt/rh/php54/root/usr/bin:/opt/rh/php54/root/usr/sbin${PATH:+:${PATH}}
export MANPATH=/opt/rh/php54/root/usr/share/man:${MANPATH}

mkdir -p propel/class
chmod -R 777 .
composer install
composer update
mkdir -p propel/class
rm -rf propel/* ; vendor/bin/propel ; export PATH=$PATH:vendor/bin/ ; propel reverse --output-dir="./propel" ; propel model:build ; composer dump-autoload ; propel config:convert
