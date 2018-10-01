#!/bin/sh

#remove if the log files are a SYMLINK like SYMLINK to /dev/stdout
if [ -h /var/log/apache2/access.log ]
  then
  rm /var/log/apache2/access.log
fi

#remove if the log files are a SYMLINK like SYMLINK to /dev/stdout
if [ -h /var/log/apache2/error.log ]
then
  rm /var/log/apache2/error.log
fi

mkdir -p /var/log/apache2/

#ln -s /log/apache2/access.log /var/log/apache2/access.log
#ln -s /log/apache2/error.log /var/log/apache2/error.log

sudo apache2-foreground