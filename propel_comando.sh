#!/bin/bash
export PATH=/opt/rh/php54/root/usr/bin:/opt/rh/php54/root/usr/sbin${PATH:+:${PATH}}
export MANPATH=/opt/rh/php54/root/usr/share/man:${MANPATH}

chmod -R 777 .
mkdir -p propel/class
rm -rf propel/* ; vendor/bin/propel ; export PATH=/opt/rh/php54/root/usr/bin:/opt/rh/php54/root/usr/sbin${PATH:+:${PATH}} ;export PATH=$PATH:vendor/bin/ ; propel reverse --output-dir="./propel" ; propel model:build ; composer dump-autoload ; propel config:convert
