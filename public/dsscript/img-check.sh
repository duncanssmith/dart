#!/bin/bash

#IMGPATH=/Users/duncansmith/Sites/dart.local/public/media/images
IMGPATH=/home/duncan/Sites/dart.local/public/media/images

cd $IMGPATH

echo '64'
ls -la 64 | wc
echo '120'
ls -la 120 | wc
echo '160'
ls -la 160 | wc
echo '320'
ls -la 320 | wc
echo '640'
ls -la 640 | wc

